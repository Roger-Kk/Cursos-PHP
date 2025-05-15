<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario{

    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 0.5; 
    }
    
    public function sobeDeNivel(){
        $this->recebeAumento($this->recuperaSalario() * 0.25);
    }
    
}