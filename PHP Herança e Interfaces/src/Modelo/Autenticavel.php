<?php 

namespace Alura\Banco\Modelo;

/*
abstract class Autenticavel{

    abstract public function podeAutenticar(string $senha): bool;

}
*/

//uma Interface é uma classe abstrata com todos os métodos abstratos, então o código acima é escrito desta forma: 

interface Autenticavel{

    public function podeAutenticar(string $senha): bool;

}