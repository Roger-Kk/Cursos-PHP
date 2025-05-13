<?php

namespace Alura\Banco\Modelo\Conta;

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Conta;

class ContaCorrente extends Conta{

    protected function percentualTarifa(): float{
        return 0.05;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void {
       if($valorATransferir > $this->saldo){
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}
