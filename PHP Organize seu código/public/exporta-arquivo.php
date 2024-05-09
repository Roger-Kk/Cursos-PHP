<?php

//var_dump($_POST);

$filme = [
    'nome' => $_POST['nome'],
    'anoLancamento' => $_POST['anoLancamento'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero'],
];

file_put_contents(__DIR__ .'filme.json', json_encode($filme));

//A função header() envia um cabeçalho http
header('Location: /sucesso.php?filme=' . $filme['nome']);
//Numa URL quando se inclui um "?" significa que o que vem depois são parâmetros
