<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

//É possível extender de apenas uma classe, mas implementar de várias interfaces
class Gerente extends Funcionario implements Autenticavel{

    public function calculaBonificacao(): float{
        return $this->recuperaSalario() * 1;
    }

    public function podeAutenticar(string $senha): bool{
        return $senha === '1234';
    }
}