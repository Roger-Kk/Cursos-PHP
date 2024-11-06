<?php

class Produto {
    //Atributos
    private ?int $id;            // A interrogação antes do tipo de dado significa que o atributo pode receber um valor inteiro ou nulo
    private string $tipo; 
    private string $nome; 
    private string $descricao;
    private string $imagem;
    private float $preco;

    //Construtor da classe:                                                                       //a imagem terá como padrão o logo do serenatto
    public function __construct(?int $id, string $tipo, string $nome, string $descricao, float $preco, string $imagem = "logo-serenatto.png"){
    $this -> id = $id;
    $this -> tipo = $tipo;
    $this -> nome = $nome;
    $this -> descricao = $descricao;
    $this -> imagem = $imagem;
    $this -> preco = $preco;
    }

    //Getters
    public function getId(): int {
        return $this -> id;
    }

    public function getTipo(): string {
        return $this -> tipo;
    }

    public function getNome(): string {
        return $this -> nome;
    }

    public function getDescricao(): string {
        return $this -> descricao;
    }

    public function getImagem(): string {
        return $this -> imagem;
    }

    public function getImagem2(): string {
        return "img/" . $this -> imagem;
    }

    public function getPreco(): float {
        return $this -> preco;
    }

    public function getPrecoFormatado(): string{
        return "R$" . number_format($this -> preco, decimals: 2);
    }

    //Setters
    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }


}



?>