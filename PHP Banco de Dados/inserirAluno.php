<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$dataPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(dsn:'sqlite' . $dataPath);

$student = new Student(
    id: null, 
    name: 'Roger',
    birth_date: new \DateTimeImmutable(time: '1997-10-15')
);

//$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birth_date()->format('Y-m-d')}')';";
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindParam(parameter: ':name', variable: $name);
//ERRO: $statement->bindValue(parameter: ':birth_date', $student->birthDate()->format(format: 'Y-m-d'));


//var_dump($pdo->exec($sqlInsert));
if($statement->execute()){
    echo 'Aluno incluído';
}


