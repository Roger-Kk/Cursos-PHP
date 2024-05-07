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

$nomeFilme = "Top Gun - Maverick";
$nomeFilme = "Se beber não case";
$nomeFilme = "Thor-Ragnarok";
$anoLancamento = $argv[1]  ?? 2022; //o $argv contém todos os valores passados pela linha de comando.
$notas = [];

//Estrutura de LOOP: FOR

for ($contador = 1; $contador < $argc; $contador ++) {
    $notas[] = (float) $argv[$contador];
};

//ForEach
foreach ($notas as $nota){
    $somaNotas += $nota;
}



//WHILE
/*
$contador = 1;
while($argv[$contador] != 0){
    $somaNotas += $argv[$contador++];
};
*/

//DO WHILE
/*
do {

} while (){

}
*/

$quantidadeNotas = $argc - 1; //o $arg contém o índice do valor passados pela linha de comando
$notaFilme = array_sum($notas)/$quantidadeNotas;
$planoPrime = true;
$incluinoPlano = $planoPrime || $anoLancamento < 2020;

echo "Nome do filme: " . $nomeFilme . "\n"; //Aspas duplas
//echo 'Nome do filme: ' . $nomeFilme . '\n'; //Aspas simples
echo "Ano de lançamento: ".$anoLancamento . "\n"; 
echo "Nota do filme: " . $notaFilme ."\n";

//Clausula IF
if ($anoLancamento > 2022) {
    echo "Esse filme é um lançamento";
} else if($anoLancamento > 2020 && $anoLancamento <= 2022){
    echo "Esse filme ainda é novo.";
}else {
    echo "Esse filme não é um lançamento\n";
}

//Match Expression
$genero = match ($nomeFilme){
    "Top Gun - Maverick" => "ação",
    "Thor-Ragnarok" => "super-herói",
    "Se beber não case" => "comédia",
    default => "desconhecido",
};
echo "O gênero do filme é ".$genero;

//Array
$notasParaOFilme = [
    10,
    9,
    8,
    7,
    6.5,
    4
];

var_dump($notasParaOFilme);

//Array associativo
$filme = [
    "nome" => "Thor - Ragnarok",
    "ano" => 2021,
    "nota" => 7.8,
    "genero" => "super-herói",
];
echo $filme["nome"]."\n";
echo $filme["nota"]."\n";

//Switch Case
/*
switch (expressão) {
    case valor1:
       // código a ser executado se a expressão for igual a valor1
       break;
    case valor2:
       // código a ser executado se a expressão for igual a valor2
       break;
    case valor3:
       // código a ser executado se a expressão for igual a valor3
       break;
    default:
       // código a ser executado se a expressão não for igual a nenhum valor
       break;
 }
 */

 //Operador ternário
 //$resultado = $expressao1 ? $expressao2 : $expressao3;
//Se $expressao1 for verdadeira (true), $resultado terá o valor 
//de $expressão2. Caso contrário, $resultado terá o valor de $expressão3.


