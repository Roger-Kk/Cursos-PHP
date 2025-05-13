<?php

//Ao definir que uma classe extende a outra, significa que ela herda tudo que a outra classe tem e mais as propriedade e métodos dessa nova classe
class Titular extends Pessoa
{
    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    public function recuperaEndereco(): Endereco{
        return $this->endereco;
    }
}
