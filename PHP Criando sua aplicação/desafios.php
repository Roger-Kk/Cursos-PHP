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

//Conta Bancária
$saldo = 1_000; //o "_" em um número
$titularConta = 'Roger K';

echo "\n\n***********************\n";
echo "Titular: $titularConta\n";
echo "Saldo atual: R$ $saldo\n";
echo "***********************\n";

do{

    echo "1. Consultar saldo atual\n";
    echo "2. Sacar valor\n";
    echo "3. Depositar valor\n";
    echo "4. Sair\n";
    echo "************************\n"; 

    $opcao = (int) fgets(STDIN);

    switch ($opcao){
        case 1:
            echo "\n\n***********************\n";
            echo "Titular: $titularConta\n";
            echo "Saldo atual: R$ $saldo\n";
            echo "***********************\n";
            break;

        case 2:
            echo "Qual valor deseja sacar?\n";
            $valorSacar = (float) fgets(STDIN);
            if ($valorSacar > $saldo){
                echo "Saldo Insuficiente.\n";
            } else {
                $saldo -= $valorSacar;
            }
            break;

        case 3:
            echo "Quanto deseja depositar?\n";
            $valorDepositar = (float) fgets(STDIN);
            $saldo += $valorDepositar;
            break;

        case 4: 
            echo "Adeus.";
            break;

        default:
            echo "Opção inválida.";
        break;
    }
} while ($opcao != 4);

