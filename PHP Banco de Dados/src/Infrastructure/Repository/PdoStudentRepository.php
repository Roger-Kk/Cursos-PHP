<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;

class PdoStudentRepository implements StudentRepository
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionCreator::createConnection();
    }
    public function allStudents():array
    {

    }
    public function studentBirthDate(\DateTimeInterface $birthDate): array
    {

    }
    public function save(Student $student): bool
    {

    }
    public function remove(Student $student): bool
    {

    }
}