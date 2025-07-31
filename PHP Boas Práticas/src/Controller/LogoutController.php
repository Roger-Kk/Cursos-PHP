<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogoutController implements Controller{

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface{

        //Formas de deslogar a sessão: 
        //1 - $_SESSION['logado'] = false;
        //2 - unset($_SESSION['logado']);
            session_destroy();
            //header('Location: /login');
            return new Response(302, [
                'Location' => '/login'
            ]);
    }
}