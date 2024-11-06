<?php

namespace Alura\Pdo\Infrastructure\Persitence;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dataPath = __DIR__.'/../../../banco.sqlite';
        return new PDO('sqlite' . $dataPath);
    }
}