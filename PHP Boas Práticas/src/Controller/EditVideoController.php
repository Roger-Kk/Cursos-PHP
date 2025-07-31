<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Helper\FlashMessageTrait;
use Alura\MVC\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EditVideoController implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);
        //$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false || $id === null){
            //header('Location: /?sucesso=0');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false){
            //header('Location: /?sucesso=0');
             return new Response(302, [
                'Location' => '/'
            ]);
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false ){
        //header('Location: /?sucesso=0');
        return new Response(302, [
                'Location' => '/'
            ]);
        }

        $video = new Video($url, $titulo);
        $video->setId($id);

        if($_FILES['image']['error'] === UPLOAD_ERR_OK){
            //Acessa a variável global $_FILES e move o arquivo para o diretório estipulado
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../../img/uploads/' . $_FILES['image']['name']
            );
            $video->setFilePath($_FILES['image']['name']);
        }


        $success = $this->videoRepository->update($video);

        if ( $success === false){
            //header('Location: /?sucesso=0');
            $this->addErrorMessage('Erro ao remover vídeo.');
             return new Response(302, [
                'Location' => '/'
            ]);
            } else {
            //header('Location: /?sucesso=1');
             return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}