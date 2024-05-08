<?php

$caminhoArquivo = __DIR__ . '/filme.json';
$conteudoArquivoFilme = file_get_contents($caminhoArquivo);
$filme = json_decode($conteudoArquivoFilme, true);

var_dump($filme);

$arquivo = fopen('teste.txt', 'r');
$primeiraLinha = fgets($arquivo);
fclose($arquivo);

$nomeArquivo = 'teste.txt';
$novaFrase = "\nPHP é incrível!";

 // Abre o arquivo para escrita no final
$arquivo = fopen($nomeArquivo, 'a');
 // Escreve no arquivo
fwrite($arquivo, $novaFrase);
 // Fecha o arquivo
fclose($arquivo);

$stringJson = '{"nome":"Vinicius","anoNascimento":1997,"profissao":"Dev"}';
var_dump(json_decode($stringJson, true));

