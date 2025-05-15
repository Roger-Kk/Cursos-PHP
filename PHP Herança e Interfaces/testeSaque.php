<?php

use Alura\Banco\Modelo\Conta\{Conta, ContaPoupanca, ContaCorrente, Titular};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';


$conta = new ContaPoupanca(
    new Titular(
        new CPF('123.456.789-10'),
        'Roger K',
        new Endereco('Curitiba', 'Agua Verde', 'Rua Para', '728')
    )
);

$conta->depositar(500);
$conta->sacar(100);
echo $conta->recuperaSaldo();