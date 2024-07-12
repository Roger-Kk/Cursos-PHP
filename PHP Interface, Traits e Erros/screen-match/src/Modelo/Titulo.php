<?php

namespace ScreenMatch\Modelo;

// Abstração: Uma classe abstrata pode ter métodos abstratos e não podem ser instanciadas
abstract class Titulo implements Avaliavel
{

use ComAvaliacao;
//ao usar uma Trait, é como se o PHP copiasse e colasse os métodos da trait,
// sem que a classe seja estendida da ComAvaliacao

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

    abstract public function duracaoEmMinutos(): int;
    
}