<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;
use Alura\MVC\Helper\FlashMessageTrait;

class NewVideoController implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(): void{
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false){
            $this->addErrorMessage('URL inválida');
            header('Location: /novo-video');
            exit();
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false ){
            $this->addErrorMessage('Título não informado');
            header('Location: /novo-video');
            exit();
        }

        //Inicia um objeto Video
        $video = new Video($url, $titulo);
        
        //Verifica se um arquivo foi enviado e se não deu erro
        if($_FILES['image']['error'] === UPLOAD_ERR_OK){

            //Medida de segurança que evita o usuário enviar um "caminho duvidoso" ao subir arquivo
            $safeFileName = uniqid('upload_') . '_' . pathinfo($_FILES['image']['name'], PATHINFO_BASENAME);

            //Medida de segurança que evita o usuário enviar arquivo com extensão de imagem mas ser outra coisa
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($_FILES['image']['tmp_name']);

            if(str_starts_with($mimeType, 'image/')){
                 //Acessa a variável global $_FILES e move o arquivo para o diretório estipulado
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../../img/uploads/' . $safeFileName 
                );
                $video->setFilePath($safeFileName);
            }
        }

        $success = $this->videoRepository->add($video);
        if($success === false){
            $this->addErrorMessage('Erro ao cadastrar vídeo');
            header('Location: /novo-video');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}