<?php

declare (strict_types=1);

namespace Alura\MVC\Entity;

class Video
{
    #define uma propriedade $url que permite atribuição de valor uma vez 'readonly'
    public readonly int $id;
    public readonly string $url;

    #recebe a propriedade $url e o $title, inicializando-o como propriedade
    public function __construct(
        string $url,
        public readonly string $title,
    ){
        $this->setUrl($url);
    }

    private function setUrl(string $url){
        if (filter_var($url, FILTER_VALIDATE_URL) === false){
            throw new \InvalidArgumentException();
        }
        $this->url = $url;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

}

