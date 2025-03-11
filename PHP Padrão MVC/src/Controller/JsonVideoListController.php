<<<<<<< HEAD
<?php

declare (strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class JsonVideoListController implements Controller{
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{
        $videoList = array_map(function(Video $video): array{
            return [
                'url' => $video->url,
                'title' => $video->title,
                'file_path' => '/img/uploads/' . $video->getFilePath(),
            ];
        }, $this->videoRepository->all());
        echo json_encode($videoList);
    }
=======
<?php

declare (strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class JsonVideoListController implements Controller{
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{
        $videoList = array_map(function(Video $video): array{
            return [
                'url' => $video->url,
                'title' => $video->title,
                'file_path' => '/img/uploads/' . $video->getFilePath(),
            ];
        }, $this->videoRepository->all());
        echo json_encode($videoList);
    }
>>>>>>> 0641de1614d0790b43b701fbad6295a7628803c3
}