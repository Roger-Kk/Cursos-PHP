<?php
//Exibir números ímpares de 0 a 100:

for ($i = 0; $i <= 100; $i ++){
    if($i % 2 == 0){
        continue;
    }
    echo "$i".PHP_EOL;
}

//Exibir a tabuada de determinado número: 
$num = 5;
for ($i=1; $i <= 9; $i++){
    echo "Multiplicando $num x $i = " . ($num * $i) . PHP_EOL; 
}

//Calcular IMC a partir de Altura e Peso e exibir se IMC está acima
//ou abaixo do ideal:

$altura = 1.88;
$peso = 88;

$imc = $peso / $altura**2;
echo "Seu IMC é $imc. ";

if ($imc > 18.5 && $imc < 24.9){
    echo "Peso normal.";
} else if ($imc < 18.5){
    echo "Abaixo do peso";
} else 
    echo "Acima do peso"; 