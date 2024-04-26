<?php

//Verificar se um ano é bissexto:
$ano = 2024;
if (($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0) {
    echo "$ano é bissexto.";
} else {
    echo "$ano não é bissexto.";
}

echo "\n"; 

//Temperatura de ºC para ºF: 
$temperaturaEmCelsius = 30.4; // Modifique esse valor para a temperatura que desejar
$temperaturaEmFahrenheit = $temperaturaEmCelsius * 1.8 + 32;

$mensagem = "A temperatura de $temperaturaEmCelsius Celsius é equivalente a $temperaturaEmFahrenheit Fahrenheit";

echo $mensagem;
