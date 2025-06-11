<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use PDO;
use Alura\MVC\Helper\FlashMessageTrait;

class LoginController implements Controller{

    use FlashMessageTrait;
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

    /*
        //Verificação de Password não funcionou
        $correctPassword = password_verify($password, $userData['password'] ?? '');
        if($correctPassword){
        
        //Realização de rehash de senhas caso necessário
        if(password_needs_rehash($userData['password'], PASSWORD_ARGON2ID)){
            $this->pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
            $statement->bindValue(1, password_hash($password, PASSWORD_ARGON2ID));
            $statement->bindValue(2, $userData['id']);
            $statement->execute();
        }
        
    */

        //Se for fazer a verificação do password, comentar as duas proximas linhas e descomentar as de cima
        $correctEmail = $userData['email'];
        if($correctEmail == $email){
            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            //enviar uma mensagem para /login
            $this->addErrorMessage("Usuário ou senha inválidos");
            header('Location: /login?deuerro');
        }
    }
}