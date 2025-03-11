<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use PDO;

class LoginController implements Controller{
    private \PDO $pdo;
    public function __construct(){
  
    }

    public function processaRequisicao():void{

        //Estabelece a conexão com banco de dados
        $host = 'localhost';
        $dbname = 'padrao_mvc';
        $username = 'root';
        $password = '';
    
        $pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
        //Busca usuário no banco de dados com o e-mail
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $sql = 'SELECT * FROM padrao_mvc.users WHERE email = ?';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');
        if($correctPassword){
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}