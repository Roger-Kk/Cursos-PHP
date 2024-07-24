<<<<<<< HEAD
<?php

namespace ScreenMatch\Modelo;
use ScreenMatch\Exception\NotaInvalidaException;

//"Características", ou Traits ou Herança Horizontal
//Permite que outras classes usem dos métodos, porém sem ser um tipo, ou ainda
//sem permitir que haja outras classes estendidas dela.
trait ComAvaliacao
{
    private array $notas = [];

    //Ao comentar da seguinte forma, quando se chama o método e passa o mouse em cima, mostra o comentário.
    /**
     * @throws \InvalidArgumentException Se a nota for negativa ou maior que 10
     */
    public function avalia(float $nota): void
    {   
        //Tratamento de erros: Caso a nota seja negativa ou > 10 gera um exceção
        if($nota < 0 || $nota > 0){
            throw new NotaInvalidaException();
        }
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }


=======
<?php

namespace ScreenMatch\Modelo;
use ScreenMatch\Exception\NotaInvalidaException;

//"Características", ou Traits ou Herança Horizontal
//Permite que outras classes usem dos métodos, porém sem ser um tipo, ou ainda
//sem permitir que haja outras classes estendidas dela.
trait ComAvaliacao
{
    private array $notas = [];

    //Ao comentar da seguinte forma, quando se chama o método e passa o mouse em cima, mostra o comentário.
    /**
     * @throws \InvalidArgumentException Se a nota for negativa ou maior que 10
     */
    public function avalia(float $nota): void
    {   
        //Tratamento de erros: Caso a nota seja negativa ou > 10 gera um exceção
        if($nota < 0 || $nota > 0){
            throw new NotaInvalidaException();
        }
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }


>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
}