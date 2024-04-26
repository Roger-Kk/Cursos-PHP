
<?php


//OPERADORES
$a = 10; // Atribui o valor 10 à variável $a
$b = 5; // Atribui o valor 5 à variável $b
$c = 30; // Atribui o valor 30 à variável $c

$igual = $b == $a; // Nesse caso, a variável $igual ficará com o valor *false*, pois o valor de $b não é igual ao valor de $a.
$diferente = $b != $c; // A variável $diferente ficará com o valor *true*, pois o valor de $b é diferente do valor de $c.
$maior = $b > $a; // A variável maior ficará com o valor *false*, pois o valor de $b é menor que o valor de $a.
$menorIgual = $b <= $c; // A variável $menorIgual ficará com o valor *true*, pois o valor de $b é menor que o valor de $c.


//Aplicação Screen Match
 
echo "Bem vindo ao Screen Match";
echo "\n";

$nomeFilme = "Top Gun";
$anoLancamento = $argv[1]  ?? 2022; //o $argv contém todos os valores passados pela linha de comando.
$somaNotas = 9 + 6 + 8 + 7.5 + 5;
$notaFilme = $somaNotas/5;
$planoPrime = true;
$incluinoPlano = $planoPrime || $anoLancamento < 2020;

echo "Nome do filme: " . $nomeFilme . "\n"; //Aspas duplas
echo 'Nome do filme: ' . $nomeFilme . '\n'; //Aspas simples
echo "Ano de lançamento: ". $anoLancamento . "\n"; 










