<?php

require_once 'vendor/autoload.php';

$dataPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO(dsn: 'sqlite:' . $dataPath);

//Fazer uma consulta com where no SQL pelo PHP.Fetch(): 
$statement = $pdo->query(statement: 'SELECT * FROM students');
while ($studentData = $statement->fetch(fetch_style: PDO::FETCH_ASSOC)){
    $student = new Student(
        $studentData['id'],
        $studenData['name'],
        new \DateTimeImmutable($studenData['birth_date'])
    );
    echo $student->age() . PHP_EOL;
}
exit(); 

//Fazer uma busca por todos os dados no SQL pelo PHP.fetch(): 
$statement = $pdo->query(statement: "SELECT * FROM students;");
//var_dump($statement->fetchAll());
$studentList = $statement->fetchAll(fetch_style: PDO::FETCH_ASSOC);
//$studentList = $statement->fetchAll(fetch_style: PDO::FETCH_CLASS, fetch_argument: Student::class);
echo $studentList[0]['name'];

foreach($studentDataList as $studentData){
    $studentList[] = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList); 
