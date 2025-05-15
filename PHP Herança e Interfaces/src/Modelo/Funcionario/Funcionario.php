<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\{Pessoa, CPF};

abstract class Funcionario extends Pessoa{

    private string $cargo; 
    private $salario;

    public function __construct (string $nome, CPF $cpf, string $cargo, float $salario){

        parent::__construct($nome, $cpf);
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    //GETTERS
    public function recuperaCargo(): string{
        return $this->cargo;
    }

    public function recuperaSalario(): float{
        return $this->salario;
    }

    //Setters
    public function alteraNome(string $nome): void{
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recebeAumento(float $valorAumento): void{
        if ($valorAumento < 0){
            echo "Aumento deve ser positivo";
            return;
        }
        $this->salario += $valorAumento;
    }



    public function calculaBonificacao(): float{
            return $this->salario * 0.1;
    }
}