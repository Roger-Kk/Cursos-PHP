<?php

use ScreenMatch\Modelo\{
    Filme, Episodio, Serie, Genero, Titulo
};
use ScreenMatch\Calculos\{
   CalculadoraDeMaratona, ConversorNotaEstrela
};
use ScreenMatch\Exception\NotaInvalidaException;


require 'autoload.php';

$serie = new Serie ('Nome da Serie', 2024, 7, 20, 30);
//$episodio = new Episodio ($serie, "Piloto", 1);
$conversor = new ConversorNotaEstrela();
/*
$serie->avalia (10);
$serie->avalia(8);
$serie->avalia(9);
$serie->avalia(8,5);
$serie->avalia(10);
*/

//Ao ser criada uma exception, pode-se chamá-la pelo try{}cath(exception){}
try{
$serie->avalia(45);
$serie->avalia(-35);

echo $conversor->converte ($serie);
} catch(NotaInvalidaException $e){
    echo "Um problema aconteceu: " . $e->getMessage();
}
