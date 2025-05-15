<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Gerente, Desenvolvedor, Atendente};
use Alura\Banco\Service\ControladorDeBonificacoes;

$umFuncionario = new Desenvolvedor('Zao Master', new CPF('001.002.003-04'), 'Desenvolvedor', 10000);
$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Atendente('Small girl Attendant', new CPF('111.222.333-44'), 'Atendente', 3000);

$umGerente = new Gerente('Celso Bonavida', new CPF('000.002.354-68'), 'Gerente', 12000);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umGerente);

echo $controlador->recuperaTotal();