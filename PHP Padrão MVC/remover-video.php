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
    $id = $_GET['id'];
    $sql = 'DELETE FROM padrao_mvc.videos WHERE id = ?';
    $statement = $pdo -> prepare($sql);
    $statement ->bindValue(1, $id);
    
    if ( $statement->execute() === false){
        header('Location: /?sucesso=0');
        } else {
        header('Location: /?sucesso=1');
    }
} catch (PDOException $e){
    echo "Erro: ". $e->getMessage();
 }








