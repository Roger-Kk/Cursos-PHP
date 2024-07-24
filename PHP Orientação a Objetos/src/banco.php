<?php
//require 'src/Cliente.php';
require 'src/Profissao.php';
require 'src/Conta.php';
require 'src/Titular.php';
require 'src/Cpf.php';

$roger = new Titular(new Cpf(numero: '123.456.789-10'), nome:'Rogerzão');
$primeiraConta = new Conta($roger); 
//var_dump($primeiraConta); 
$primeiraConta -> depositar(valorADepositar: 500);
$primeiraConta -> sacar(valorASacar: 300);

$rafa = new Titular(new Cpf(numero: '001.002.003.-04'), nome: 'Rafinha');
$segundaConta  = new Conta($rafa);
//var_dump($segundaConta);


echo $primeiraConta->recuperarCpfTitular().PHP_EOL;
echo $primeiraConta->recuperarNomeTitular().PHP_EOL;
echo $primeiraConta->recuperarSaldo(). PHP_EOL;
echo Conta::recuperaNumeroDeContas(); 
