<?php

// Abstração: Uma classe abstrata pode ter métodos abstratos e não podem ser instanciadas
abstract class Titulo implements Avaliavel
{
    private array $notas;

    public function __construct(
        /*
        public readonly $nome,
        public readonly $anoLancamento
        public readonly Genero $genero,
        */
        public $nome,
        public $anoLancamento
    ) {
        $this->notas = [];
    }

    public function avalia(float $nota): void
    {
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }

    abstract public function duracaoEmMinutos(): int;
    
}