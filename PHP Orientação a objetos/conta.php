<?php

function criarConta(string $cpf, string $nomeTitular, float $saldo): array{
    
    return [
        $cpf => [
            'titular'=> $nomeTitular,
            'saldo'=> $saldo,
        ]
    ];
}


$conta = criarConta('123.456.789-10', 'Roger', 1000);
var_dump($conta); 





