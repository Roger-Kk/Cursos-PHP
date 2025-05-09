<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;
use Alura\MVC\Repository\VideoRepository;

class VideoListController implements Controller{

    #receber uma instância do PDO
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{
        $videoList = $this-> videoRepository->all();
        require_once __DIR__ . '/../../views/video-list.php';
    }
}



