<?php
use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

//Fazer uma consulta com where no SQL pelo PHP.Fetch(): 
$statement = $pdo->query('SELECT * FROM alunos;');
$studentList = $statement->fetchAll(PDO::FETCH_ASSOC);
//$studentList = $statement->fetchAll(fetch_style: PDO::FETCH_CLASS, fetch_argument: Student::class);
$studentList = [];

foreach($studentDataList as $studentData){
    $studentList[] = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList); 
