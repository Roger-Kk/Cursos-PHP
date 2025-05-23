<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

//Classe criada para ir somando o total de bonificações
class ControladorDeBonificacoes {
    
    private $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario){
        $this->totalBonificacoes += $funcionario->calculaBonificacao();
    }

    public function recuperaTotal(): float{
        return $this->totalBonificacoes;
    }

}