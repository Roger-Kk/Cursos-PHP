<?php

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Desenvolvedor;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();

$umGerente = new Desenvolvedor('Guy anyone', new CPF('365.456.879-56'), 12000);

$autenticador->tentaLogin($umGerente, '1234');