<?php

declare(strict_types=1);


namespace Alura\MVC\Controller;

class LoginFormController implements Controller {

    public function processaRequisicao(): void {
        //Verificação se a informação de sessão logada existe, duas formas de fazer isso:

        if(array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true){
        //if(($_SESSION['logado'] ?? false) === true){
            header('Location: /');
        }
        require_once __DIR__ . '/../../views/login-form.php';
    }
}