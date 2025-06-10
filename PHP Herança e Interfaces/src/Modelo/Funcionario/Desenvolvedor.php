<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Desenvolvedor extends Funcionario implements Autenticavel{

    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 0.5; 
    }
    
    public function sobeDeNivel(){
        $this->recebeAumento($this->recuperaSalario() * 0.25);
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === '4321';
    }
    
}