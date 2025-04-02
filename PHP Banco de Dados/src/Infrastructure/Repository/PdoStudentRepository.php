<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    //Implementação da conexão com o banco de dados acessando o método estático do ConnectionCreator
    /*
    public function __construct()
    {
        $this->connection = ConnectionCreator::createConnection();
    }
    */
    
    //INJEÇÃO DE DEPENDÊNCIA
    //Ao invés de implementar a conexão direta com o banco de dados no construtor da classe, o construtor recebe a conexão com PDO
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    
    
    public function allStudents():array
    {
        $sqlQuery = 'SELECT * FROM alunos;';
        $stmt = $this->connection->query($sqlQuery);

        //método "hydrateStudentList"
        return $this->hydrateStudentList($stmt);
    }

    public function studentBirthDate(\DateTimeInterface $birthDate): array
    {
        $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentsList($stmt);
    }

    //Função para "hidratar" = função que traz todos os dados de uma query de um banco de dados e transfere para a estrutura do código
    private function hydrateStudentList(\PDOStatement $stmt): array
    {
        $studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach ($studentDataList as $studentData){
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }
        return $studentList;
    }

    public function save(Student $student): bool
    {
        if($student->id() === null){
            return $this->insert($student);
        }
        return $this->update($student);
    }

    private function insert(Student $student): bool
    {                                                                //utilização de parâmetros nomeados
        $insertQuery = 'INSERT INTO alunos (name, birth_date) VALUES (:name, :birth_date);';
        $stmt = $this->connection->prepare($insertQuery);

        //fazendo o bindValue direto no execute passando um array com os parâmetros nomeados como parâmetro
        $success = $stmt->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d'),
        ]);
        if($success){
            $student->defineId($this->connection->lastInsertId());
        }
        return $success;
    }

    private function update(Student $student): bool
    {
        $updateQuery = 'UPDATE alunos SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name', $student->name());
        $stmt->bindValue('birth_date', $student->birthDate());
        $stmt->bindValue(':id', $student->id(), PDO :: PARAM_INT);

        return $stmt->execute();
    }

    public function remove(Student $student): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM alunos WHERE id = ?;');
        $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);
        return $stmt->execute();
    }
}