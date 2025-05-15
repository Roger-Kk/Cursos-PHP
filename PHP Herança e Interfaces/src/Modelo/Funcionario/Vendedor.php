<?php

namespace Alura\Banco\Modelo\Funcionario;

class Vendedor extends Funcionario{

    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario()*0.2;
    }

}