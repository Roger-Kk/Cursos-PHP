<?php

namespace Alura\Banco\Modelo; 

class Pessoa {

    use AcessoPropriedades; //chamando a Trait, inserindo o conteúdo dela na classe
    protected string $nome; 
    private $cpf; 

    public function __construct(string $nome, $cpf){
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string{
        return $this->nome;
    }

    public function recuperaCpf(): string{
        return $this->cpf->recuperaNumero();
    }

    protected function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }


}