<?php

declare (strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class JsonVideoListController implements Controller{
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface{
        $videoList = array_map(function(Video $video): array{
            return [
                'url' => $video->url,
                'title' => $video->title,
                'file_path' => '/img/uploads/' . $video->getFilePath(),
            ];
        }, $this->videoRepository->all());

        return new Response(200, [
            'Content-Type' =>'application/json'
        ], json_encode($videoList));
    }
}