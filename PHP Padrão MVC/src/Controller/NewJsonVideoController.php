<<<<<<< HEAD
<?php

declare (strict_types=1);

namespace Alura\MVC\Controller;

class NewJsonVideoController implements Controller{

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{

        $request = file_get_contents('php://input');
        $videoData - json_decode($request, true);
        $video = new Video($videoData['url'], $videoData['title']);
        $this->videoRepository->add($video);

        http_response_code(201);
    }
}
=======
<?php

declare (strict_types=1);

namespace Alura\MVC\Controller;

class NewJsonVideoController implements Controller{

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{

        $request = file_get_contents('php://input');
        $videoData - json_decode($request, true);
        $video = new Video($videoData['url'], $videoData['title']);
        $this->videoRepository->add($video);

        http_response_code(201);
    }
}
>>>>>>> 0641de1614d0790b43b701fbad6295a7628803c3
