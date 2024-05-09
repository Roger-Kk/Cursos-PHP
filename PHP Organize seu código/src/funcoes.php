<?php

//Organizando o código em funções:
function exibeMensagemLancamento(int $ano): void{
    if ($ano > 2022) {
        echo "Esse filme é um lançamento";
    } else if($ano > 2020 && $ano <= 2022){
        echo "Esse filme ainda é novo.";
    }else {
        echo "Esse filme não é um lançamento\n";
    }
}

function incluiNoPlano(bool $planoPrime, int $anoLancamento){
   return  $planoPrime || $anoLancamento < 2020;
}

function criaFilme(string $nome, int $anoLancamento, float $nota, string $genero){

    return [
        'nome' => $nome,
        'ano' => $anoLancamento,
        'nota' => $nota,
        'genero' => $genero
    ];
}
