<?php

declare(strict_types=1);

$host = 'localhost';
$dbname = 'padrao_mvc';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $argv[1];
$password = $argv[2];
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO padrao_mvc.users (email, password)  VALUES (?, ?);';
$statement = $pdo->prepare($sql);
$statement->bindValue(1,$email);
$statement->bindValue(2,$hash);
$statement->execute();
