<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class EditVideoController implements Controller{
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false || $id === null){
            header('Location: /?sucesso=0');
            return;
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false){
            header('Location: /?sucesso=0');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false ){
        header('Location: /?sucesso=0');
            return;
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
            header('Location: /?sucesso=0');
            } else {
            header('Location: /?sucesso=1');
        }
    }
=======
<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class EditVideoController implements Controller{
    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false || $id === null){
            header('Location: /?sucesso=0');
            return;
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false){
            header('Location: /?sucesso=0');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false ){
        header('Location: /?sucesso=0');
            return;
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
            header('Location: /?sucesso=0');
            } else {
            header('Location: /?sucesso=1');
        }
    }
>>>>>>> 0641de1614d0790b43b701fbad6295a7628803c3
}