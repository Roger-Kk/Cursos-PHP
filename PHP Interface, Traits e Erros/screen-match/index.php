<?php

require 'autoload.php';
//require "src/Modelo/Genero.php"; OBS: enum só é possível executar a partir do PHP 8.1
/*
require "src/Modelo/ComAvaliacao.php";
require "src/Modelo/Avaliavel.php";
require "src/Modelo/Episodio.php";
require "src/Modelo/Titulo.php";
require "src/Modelo/Serie.php";
require "src/Modelo/Filme.php";
require "src/Calculos/CalculadoraDeMaratona.php";
require "src/Calculos/ConversorNotaEstrela.php";
*///Ao utilizar a estrutura lógica de namespaces, não é necessário mais os
//requires.

use ScreenMatch\Modelo\{
     Filme, Episodio, Serie, Genero, Titulo
};
use ScreenMatch\Calculos\{
    CalculadoraDeMaratona, ConversorNotaEstrela
};

echo "Bem-vindo(a) ao ScreenMatch\n";

$filme = new Filme(
    'Thor - Ragnarok',
    2021,
    //Genero::SuperHeroi,
    180,
);

$filme->avalia(10);
$filme->avalia(10);
$filme->avalia(10);
$filme->avalia(10);
$filme->avalia(10);
$filme->avalia(10);
$filme->avalia(5);
$filme->avalia(5);

var_dump($filme);

echo $filme->media() . "\n";

echo $filme->anoLancamento . "\n";

//$serie = new Serie('Lost', 2007, Genero::Drama, 10, 20, 30);
$serie = new Serie('Lost', 2007, 10, 20, 30);
//$episodio = new Episodio($serie, 'Episódio 1', 1);
echo $serie->anoLancamento . "\n";

$serie->avalia(8);

echo $serie->media() . "\n";

$calculadora = new CalculadoraDeMaratona();
$calculadora->inclui($filme);
$calculadora->inclui($serie);
$duracao = $calculadora->duracao();

echo "Para essa maratona, você precisa de $duracao minutos\n";

$conversor = new ConversorNotaEstrela();
echo $conversor->converte($serie) . " estrelas.\n";
echo $conversor->converte($filme) . " estrelas.\n";

