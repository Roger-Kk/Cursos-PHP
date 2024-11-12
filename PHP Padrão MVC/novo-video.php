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

try{
    $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
    $statement = $pdo->prepare($sql);
    $statement -> bindValue(1, $_POST['url']);
    $statement -> bindValue(2, $_POST['titulo']);
    
    if ( $statement->execute() === false){
        header('Location: /index.php?sucesso=0');
        } else {
        header('Location: /index.php?sucesso=1');
    }
    } catch (PDOException $e){
    echo "Erro: ". $e->getMessage();
 }


