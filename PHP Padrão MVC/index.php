<?php

declare(strict_types=1);

use Alura\MVC\Controller\{
    VideoListController,
    Controller,
    DeleteVideoController,
    EditVideoController,
    Error404Controller,
    NewVideoController,
    VideoFormController,
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

$controller->processaRequisicao();