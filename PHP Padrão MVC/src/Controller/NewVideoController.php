<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class NewVideoController implements Controller{

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false){
            header('Location: /?sucesso=0');
            exit();
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false ){
            header('Location: /?sucesso=0');
            exit();
        }

        $success = $this->videoRepository->add(new Video($url, $titulo));
        if($success === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}