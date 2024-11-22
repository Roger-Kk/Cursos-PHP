<?php

//Estabelecer a conexão com o MYSQL via PDO: 
$host = 'localhost';
$dbname = 'padrao_mvc';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //testar a conexão com o BD:
    echo "Conexão bem-sucedida. Banco de dados selecionado: $dbname";
} catch(PDOException $e){
    echo "Erro de conexão com Banco de Dados: " . $e->getMessage();
}

//Boa prática, atribuição de variáveis e uso de função filter_input() para acessar
//os valores recebidos por método POST, ou seja, escrever o código assim: 

//$_POST['url'];
//$titulo = $_POST['titulo'];

//É a mesma coisa que escrever o código com a função filter_input(), 
//porém com validação. Se tiver erro, a url retorna false: 
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url === false){
    header('Location: /index.php?sucesso=0');
    exit();
}
$titulo = filter_input(INPUT_POST, 'titulo');
if($titulo === false ){
header('Location: /index.php?sucesso=0');
exit();
}

try{
    $sql = 'INSERT INTO padrao_mvc.videos (url, title) VALUES (?, ?)';
    $statement = $pdo->prepare($sql);
    $statement -> bindValue(1, $url);
    $statement -> bindValue(2, $titulo);
    
    if ( $statement->execute() === false){
        header('Location: /index.php?sucesso=0');
        } else {
        header('Location: /index.php?sucesso=1');
    }
    } catch (PDOException $e){
    echo "Erro: ". $e->getMessage();
 }


