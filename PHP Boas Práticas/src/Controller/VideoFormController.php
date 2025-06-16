<?php

declare(strict_types= 1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Helper\HtmlRenderTrait;
use Alura\MVC\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

//Herança do ControlerWithHtml
//class VideoFormController extends ControlerWithHtml implements Controller{
class VideoFormController implements Controller{

    use HtmlRenderTrait;

    public function __construct(private VideoRepository $repository){

    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface{
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        /**  @var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }

       //require_once __DIR__ . '/../../views/video-form.php';
       
       //echo $this->renderTemplate('video-form', ['video' => $video]);
       return new Response(200, [], $this->renderTemplate('video-form', ['video' => $video]));

    }

}