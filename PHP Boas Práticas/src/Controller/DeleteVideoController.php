<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Helper\FlashMessageTrait;
use Alura\MVC\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DeleteVideoController implements Controller
{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        //Alterado código após a função processaRequisicao usar a interface do PSR7
        //$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            //header('Location: /?sucesso=0');
            $this->addErrorMessage('ID inválido.');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
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
