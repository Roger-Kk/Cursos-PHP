<?
//Hello World
echo "Olá Mundo";
?>

<?php
//Declaração Variáveis
$idade = 21;
echo $idade;

//Operações Matemáticas
$daquiaDezAnos = $idade + 10;
$idadeaCincoAnos = $idade - 5;

$soma = 2 + 2;
$subtracao = 2 - 1;
$multiplicacao = 2 * 2;
$divisao = 2 / 2;
$aoCubo = 2**3;
$restoDivisao = 10 % 3;

echo $restoDivisao;

//Pegar tipo variável
echo gettype($idade);

$decimal = 100.30;
echo gettype($decimal);

$texto = 'Texto texto';
$verdadeiro = true;
$falso = false;


//Trabalhando com textos:
echo $texto; 
echo "\n";
echo 'Olá minha idade é ' . $idade . ' anos. '; 
echo "\n"; 
echo "Olá, minha idade é ${idade} anos" . PHP_EOL; //PHP End of Line