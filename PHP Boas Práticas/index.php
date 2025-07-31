<?php

declare(strict_types=1);

use Alura\MVC\Controller\{
    Controller,
    Error404Controller,
};
use Alura\MVC\Repository\VideoRepository;

require_once __DIR__.'/vendor/autoload.php';

$host = 'localhost';
$dbname = 'padrao_mvc';
$username = 'root';
$password = '';
try{
    $pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //testar a conexão com o BD:
    //echo "Conexão bem-sucedida. Banco de dados selecionado: $dbname";
} catch(PDOException $e){
    echo "Erro de conexão com Banco de Dados: " . $e->getMessage();
}
$pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

//Inicializar a sessão, guardando cookies de login e validando ao carregar
session_start();
session_regenerate_id();
$isLoginRoute = $pathInfo === '/login';
if(!array_key_exists('logado', $_SESSION) && !$isLoginRoute){
    header('Location: /login');
    return;
}

$key = "$httpMethod|$pathInfo";
if(array_key_exists($key, $routes)){
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, //ServerRequestFactory
    $psr17Factory, //UriFactory
    $psr17Factory, //UploadedFileFactory
    $psr17Factory, //StreamFactory
);

//Usar a interface psr17, método fromGlobals(), permite acesso a _POST, _GET, etc
$request = $creator->fromGlobals();

/** @var Controller $controller */
$response = $controller->processaRequisicao($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values){
    foreach($values as $value){
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();

/* TRECHO DE COD QUE FOI SUBSTITUIDO PELO ROUTER: 

if(!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO']==='/'){
    $controller = new VideoListController($videoRepository);
}elseif($_SERVER['PATH_INFO']==='/novo-video'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller = new VideoFormController($videoRepository);
    } elseif($_SERVER['REQUEST_METHOD']==='POST'){
        $controller = new NewVideoController($videoRepository);
    }
}elseif($_SERVER['PATH_INFO']=== '/editar-video'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
       $controller = new VideoFormController($videoRepository);
    } elseif($_SERVER['REQUEST_METHOD']==='POST'){
       $controller = new EditVideoController($videoRepository);
    }
}elseif($_SERVER['PATH_INFO']=== '/remover-video'){
    $controller = new DeleteVideoController($videoRepository);
} else {
   
   $controller = new Error404Controller();
}
*/
