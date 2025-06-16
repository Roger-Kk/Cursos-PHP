<?php

declare(strict_types=1);


namespace Alura\MVC\Controller;

use Alura\MVC\Helper\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

//class LoginFormController extends ControlerWithHtml implements Controller {
class LoginFormController implements Controller {

    use HtmlRenderTrait;

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface {
        //Verificação se a informação de sessão logada existe, duas formas de fazer isso:

        if(array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true){
        //if(($_SESSION['logado'] ?? false) === true){
            //header('Location: /');
            return new Response(302, [
                'Location' => '/'
            ]);
        }
        
        //require_once __DIR__ . '/../../views/login-form.php';
        //echo $this->renderTemplate('login-form');
        return new Response(200, [], $this->renderTemplate('login-form'));
    }
}