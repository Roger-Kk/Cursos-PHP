<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Nyholm\Psr7\Response;
use Alura\MVC\Repository\VideoRepository;
use Alura\MVC\Helper\FlashMessageTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewVideoController implements Controller{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository){

    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface{

        
        //$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

        $requestBody = $request->getParsedBody();
        $url = filter_var($requestBody['url'], FILTER_VALIDATE_URL);
        if($url === false){
            $this->addErrorMessage('URL inválida');
            //header('Location: /novo-video');
             return new Response(302, [
                'Location' => '/novo-video'
            ]);
        }

        //$titulo = filter_input(INPUT_POST, 'titulo');
        $titulo = filter_var($requestBody['titulo']);
        if($titulo === false ){
            $this->addErrorMessage('Título não informado');
            //header('Location: /novo-video');
             return new Response(302, [
                'Location' => '/novo-video'
            ]);
        }

        //Inicia um objeto Video
        $video = new Video($url, $titulo);
        //$video->setId($id);
        
        //Verifica se um arquivo foi enviado e se não deu erro
        $files = $request->getUploadedFiles();

        /** @var UploadedFileInterface $uploadedImage */
        $uploadedImage = $files['image'];
        //if($_FILES['image']['error'] === UPLOAD_ERR_OK){
        if($uploadedImage->getError() === UPLOAD_ERR_OK){
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $tmpFile = $uploadedImage->getStream()->getMetadata('uri');
            //$mimeType = $finfo->file($_FILES['image']['tmp_name']);
             $mimeType = $finfo->file($tmpFile);

            if(str_starts_with($mimeType, 'image/')){

            //Medida de segurança que evita o usuário enviar um "caminho duvidoso" ao subir arquivo
            //$safeFileName = uniqid('upload_') . '_' . pathinfo($_FILES['image']['name'], PATHINFO_BASENAME);
            $safeFileName = uniqid('upload_') . '_' . pathinfo($uploadedImage->getClientFileName(), PATHINFO_BASENAME);
            $uploadedImage->moveTo(__DIR__ . '/../../public/img/uploads/' . $safeFileName);
            
            //Acessa a variável global $_FILES e move o arquivo para o diretório estipulado
            /*move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../../img/uploads/' . $safeFileName 
            );*/
            $video->setFilePath($safeFileName);
            }
        }

        $success = $this->videoRepository->add($video);
        if($success === false){
            $this->addErrorMessage('Erro ao cadastrar vídeo');
            //header('Location: /novo-video');
             return new Response(302, [
                'Location' => '/novo-video'
            ]);
        } else {
            //header('Location: /?sucesso=1');
             return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}