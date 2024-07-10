<?php

class Titular{
    private $cpf;
    private string $nome;

    public function __construct(Cpf $numero, string $nome){
        $this->cpf = $numero;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    //Getters: 
    public function recuperaCpf(): string{
        return $this->cpf->recuperaNumero();
    }

    public function recuperaNome(): string{
        return $this->nome;
    }
    private function validaNomeTitular(string $nomeTitular){
        if(strlen($nomeTitular)< 5){
            echo "Nome precisa ter pelo menos 5 caracteres."; 
            exit();
        }
    }
}