<?php

namespace Alura\Banco\Modelo\Funcionario;

class Gerente extends Funcionario{

    public function calculaBonificacao(): float{
        return $this->recuperaSalario() * 1;
    }

    public function podeAutenticar(string $senha): bool{
        return $senha === '1234';
    }
}