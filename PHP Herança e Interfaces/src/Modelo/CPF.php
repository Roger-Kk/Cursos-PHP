<?php

namespace Alura\Banco\Modelo; 

final class CPF //Uma classe final significa que outras classes não consegue se estender a partir dela, ou seja, essa é a classe final. 
                //Isso também pode ser aplicado aos métodos, impedindo que estes sejam sobrescritos
{
    private $numero;

    public function __construct(string $numero)
    {
        $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($numero === false) {
            echo "Cpf inválido";
            exit();
        }
        $this->numero = $numero;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }
}
