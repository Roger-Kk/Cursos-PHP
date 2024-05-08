<?php

require __DIR__ . "/funcoes.php";

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
$incluinoPlano = incluiNoPlano($planoPrime, $anoLancamento);

echo "Nome do filme: " . $nomeFilme . "\n"; //Aspas duplas
//echo 'Nome do filme: ' . $nomeFilme . '\n'; //Aspas simples
echo "Ano de lançamento: ".$anoLancamento . "\n"; 
echo "Nota do filme: " . $notaFilme ."\n";

exibeMensagemLancamento($anoLancamento);

//Match Expression
$genero = match ($nomeFilme){
    "Top Gun - Maverick" => "ação",
    "Thor-Ragnarok" => "super-herói",
    "Se beber não case" => "comédia",
    default => "desconhecido",
};
echo "O gênero do filme é ".$genero ."\n";

//Array
$notasParaOFilme = [
    10,
    9,
    8,
    7,
    6.5,
    4
];

//var_dump($notasParaOFilme);

//Array associativo
$filme = [
    "nome" => "Thor - Ragnarok",
    "ano" => 2021,
    "nota" => 7.8,
    "genero" => "super-herói",
];
echo $filme["nome"]."\n";
echo $filme["nota"]."\n";

echo incluiNoPlano("teste",2020);

var_dump($notas);
sort($notas);
var_dump($notas);
$menorNota = min($notas);
echo "Menor nota: ".$menorNota."\n";
var_dump($filme['nome']);
var_dump($menorNota);
$posicaoTraco = strpos($filme['nome'], '-');
var_dump($posicaoTraco);
var_dump(substr($filme['nome'], 0,$posicaoTraco));

//Lendo JSON
echo json_encode($filme)."\n";
var_dump(json_decode('{"nome":"Thor - Ragnarok","ano":2021,"nota":7.8,"genero":"super-her\u00f3i"}', true));
$filmeComoStringJson = json_encode($filme);
file_put_contents(__DIR__ . '/filme.json', $filmeComoStringJson);

//Referências 
//Se passar como parâmetro o valor e alterar dentro da função o parâmetro, a variável 
//permanece inalterada:
function dobro(int $numero): int{
    $numero *= 2; // O mesmo que $numero = $numero * 2;
    return $numero;
}
$valorOriginal = 2;
$novoValor = dobro($valorOriginal);
echo $valorOriginal."\n"; // Continua sendo 2

//Porém...
//Se passarmos uma referência "&$variavel", permitimos que a variável seja manipulada: 
function dobro_ref(int &$numero): int{
    $numero *= 2;
    return $numero;
}
$valorOriginal = 2;
$novoValor = dobro_ref($valorOriginal);
echo $valorOriginal."\n"; // Agora o valor é 4, já que foi alterado dentro da função


