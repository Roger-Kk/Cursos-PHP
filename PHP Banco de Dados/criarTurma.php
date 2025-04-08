<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

//Definição da turma

//beginTransaction é um método que vai armazenando as queries;
$connection->beginTransaction();

$aStudent = new Student (
    null,
    'Nico Timba',
    new DateTimeImmutable('1985-03-04')
);
$studentRepository->save($aStudent);
$anotherStudent = new Student(
    null,
    'Robalo Master',
    new DateTimeImmutable('1960-15-09')
);
$studentRepository->save($anotherStudent);

$connection->commit();

//Caso queira cancelar o que foi feito na transação após o beginTransaction, pode-se usar o rollBack() para desfazer.
//$connection->rollBack();

//Inserir os alunos da turma

//ATENÇÃO: CURSO FINALIZADO NA AULA 5. Não foi escrito o código de tratamento de erros das aulas 6 e 7. 