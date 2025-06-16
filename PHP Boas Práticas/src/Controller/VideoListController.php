<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;
use Alura\MVC\Repository\VideoRepository;
use Alura\MVC\Helper\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

//Ao usar a Trait HtmlRenderTrait não precisa mais extender do ControlerWithHtml a classe abstrata
//class VideoListController extends ControlerWithHtml implements Controller{
class VideoListController implements Controller{

    use HtmlRenderTrait;

    #receber uma instância do PDO
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface{
        /*
        $videoList = $this-> videoRepository->all();
        require_once __DIR__ . '/../../views/video-list.php';
        */
        $videoList = $this->videoRepository->all();
        return new Response(200, [], $this->renderTemplate('video-list', ['videoList' => $videoList]));
        //echo $this->renderTemplate('video-list', ['videoList' => $videoList]);
    }
}



