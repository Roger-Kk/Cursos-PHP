<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

class LogoutController implements Controller{

    public function processaRequisicao(): void{

        //Formas de deslogar a sessão: 
        //1 - $_SESSION['logado'] = false;
        //2 - unset($_SESSION['logado']);
            session_destroy();
            header('Location: /login');
    }
}