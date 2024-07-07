<?php

require 'src/Conta.php';

$primeiraConta = new Conta(cpfTitular: '123.456.789-10', nomeTitular: "Rogerzão"); 
//var_dump($primeiraConta); 
$primeiraConta -> depositar(valorADepositar: 500);
$primeiraConta -> sacar(valorASacar: 300);

//Não precisa, uma vez que o construtor solicita NOME e CPF ao criar a Conta
//$primeiraConta->defineCpfTitular(cpf:'123.456.789-10');
//$primeiraConta->defineNomeTitular(nome:'Rogerzão'); 

echo $primeiraConta->recuperarCpfTitular().PHP_EOL;
echo $primeiraConta->recuperarNomeTitular().PHP_EOL;
echo $primeiraConta->recuperarSaldo(). PHP_EOL;
echo Conta::recuperaNumeroDeContas(); 