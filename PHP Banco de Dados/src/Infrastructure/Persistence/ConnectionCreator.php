<?php

namespace Alura\Pdo\Infrastructure\Persitence;

//Conexão com o Sqlite: 
/*
class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dataPath = __DIR__.'/../../../banco.sqlite';
        return new PDO('sqlite' . $dataPath);
    }
}
*/

//Conexão com o MySql: 

class ConnectionCreator
{
    public static function createConnection(): PDO{

        $host = '127.0.0.1';
        $dbName = 'pdo_banco_de_dados';
        $username = 'root';
        $password = "";

        try{
                            //string dsn data source name                         //usuário  //senha
            return new PDO("mysql:host = $host; dbname = $dbName; charset = utf8", $username, $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ativar exceções para erros
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Buscar resultados como array associativo
            ]);
        } catch(PDOException $e){
            die("Erro de conexão " . $e->getMessage());
        }
    }
}