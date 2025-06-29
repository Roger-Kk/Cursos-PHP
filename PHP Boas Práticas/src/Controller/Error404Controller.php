<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Error404Controller implements Controller
{
    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(404, [
                'Location' => '/'
            ]);
        //http_response_code(404);
    }
}
