<?php

namespace Alura\Pdo\Domain\Repository;

interface StudentRepository
{
    public function allStudents():array;

    public function studentBirthDate(\DateTimeInterface $birthDate): array;

    public function save(Student $student): bool;

    public function remove(Student $student): bool;
}