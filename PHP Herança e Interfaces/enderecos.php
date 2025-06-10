<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco('Cidade', 'Bairro', 'Rua', 'Numero');
$outroEndereco = new Endereco('Rio de Janeiro', 'Favela', 'Rua da morte', '171');

echo $umEndereco->cidade;
exit();

echo $outroEndereco . PHP_EOL;
echo $umEndereco;