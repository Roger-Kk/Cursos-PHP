<?php

namespace Alura\Banco\Modelo\Funcionario;

class Atendente extends Funcionario{

    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 0.1;
    }
}