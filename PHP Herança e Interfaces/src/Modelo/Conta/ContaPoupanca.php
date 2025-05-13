<?php

namespace Alura\Banco\Modelo\Conta;

class ContaPoupanca extends Conta{


    //Técnica de sobrescrita de método. Na classe Conta eu já tenho esse método sacar(), mas por 
    //conta do diferente valor de tarifa, criamos um método sacar para a classe ContaPoupanca
    /*
    public function sacar( float $valorASacar): void{

        $tarifaSaque = $valorASacar * 0.03;
        $valorSaque = $valorASacar + $tarifaSaque;
        if ($valorSaque > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorSaque;
    }
    */

    protected function percentualTarifa(): float
    {
        return 0.03;
    }



}