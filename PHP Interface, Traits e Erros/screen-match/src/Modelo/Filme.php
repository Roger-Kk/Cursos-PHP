<?php

class Filme extends Titulo
{
    public function __construct(
        string $nome,
        int $anoLancamento,
        //Genero $genero,
        // public readonly $duracaoEmMinutos
        private $duracaoEmMinutos
    ) {
        //parent::__construct($nome, $anoLancamento, $genero);
        parent::__construct($nome, $anoLancamento);
    }

    #[Override]
    public function duracaoEmMinutos(): int
    {
        return $this->duracaoEmMinutos;
    }
}
