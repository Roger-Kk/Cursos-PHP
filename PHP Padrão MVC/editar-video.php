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
    echo "Conexão bem-sucedida. Banco de dados selecionado: $dbname".PHP_EOL;
} catch(PDOException $e){
    echo "Erro de conexão com Banco de Dados: " . $e->getMessage();
}

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    //var_dump($id);
    //die();
    if($id === false){
        header('Location: /index.php?sucesso=0');
        exit();
    }

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
    $sql = "UPDATE padrao_mvc.videos SET url = :url, title = :title WHERE id = :id;";
    $statement = $pdo -> prepare($sql);
    $statement ->bindValue(':url', $url);
    $statement ->bindValue(':title', $titulo);
    $statement ->bindValue(':id', $id, PDO::PARAM_INT);

    if ( $statement->execute() === false){
        header('Location: /index.php?sucesso=0');
        } else {
        header('Location: /index.php?sucesso=1');
    }
} catch (PDOException $e){
    echo "Erro: ". $e->getMessage();
}








