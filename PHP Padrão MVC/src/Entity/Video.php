<<<<<<< HEAD
<?php

declare (strict_types=1);

namespace Alura\MVC\Entity;

class Video
{
    #define uma propriedade $url que permite atribuição de valor uma vez 'readonly'
    public readonly int $id;
    public readonly string $url;
    private ?string $filePath = null;

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

    public function setFilePath(string $filePath): void {
        $this->filePath = $filePath;
    }

    public function getFilePath(): ?string{
        return $this->filePath;
    }

}

=======
<?php

declare (strict_types=1);

namespace Alura\MVC\Entity;

class Video
{
    #define uma propriedade $url que permite atribuição de valor uma vez 'readonly'
    public readonly int $id;
    public readonly string $url;
    private ?string $filePath = null;

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

    public function setFilePath(string $filePath): void {
        $this->filePath = $filePath;
    }

    public function getFilePath(): ?string{
        return $this->filePath;
    }

}

>>>>>>> 0641de1614d0790b43b701fbad6295a7628803c3
