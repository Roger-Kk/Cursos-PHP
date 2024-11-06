<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 4, PDO::PARAM_INT);
//Para o método bindValue define(parametro, valor, tipo de dado)
var_dump($preparedStatement->execute());