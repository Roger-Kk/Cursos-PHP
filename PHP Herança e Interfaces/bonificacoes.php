<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Gerente, Desenvolvedor, Vendedor, Atendente};
use Alura\Banco\Service\ControladorDeBonificacoes;

$umFuncionario = new Desenvolvedor('Zao Master', new CPF('001.002.003-04'), 10000);
$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Atendente('Small girl Attendant', new CPF('111.222.333-44'), 3000);

$umVendedor = new Vendedor('João da Silva', new CPF('123.123.123-45'), 5000);

$umGerente = new Gerente('Celso Bonavida', new CPF('000.002.354-68'), 12000);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umVendedor);
$controlador->adicionaBonificacaoDe($umGerente);

echo $controlador->recuperaTotal();