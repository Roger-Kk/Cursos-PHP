<?php

namespace Alura\Banco\Modelo; 

class Endereco{

    //Ao inserir o "use" dentro de uma classe, significa que o conteúdo da Trait será inserido na classe.
    use AcessoPropriedades;
    private string $cidade;
    private string $bairro; 
    private string $rua; 
    private string $numero;

    public function __contruct(string $cidade, string $bairro, string $rua, string $numero){
        $this->cidade = $cidade;
        $this->bairro = $bairro; 
        $this->rua = $rua; 
        $this->numero = $numero; 
    }

    //Getters
    public function recuperaCidade(): string {
        return $this->cidade;
    }
    public function recuperaBairro(): string {
        return $this->bairro;
    }
    public function recuperaRua(): string {
        return $this->rua;
    }
    public function recuperaNumero(): string {
        return $this->numero;
    }

    //Métodos especiais do PHP iniciam com " __ "

    //Método para retornar string 
    public function __toString(): string
    {
        return `{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}`;
    }

    //Método para chamar uma função getter do objeto passando como parâmetro o atributo
    //Esse método deixa de ser necessário aqui, pois será passado pela Trait AcessoPropriedades
    /*
    public function __get (string $nomeAtributo){

        $metodo = 'recupera' . ucfirst($nomeAtributo);
        return $this->$metodo;
    }
    */
}