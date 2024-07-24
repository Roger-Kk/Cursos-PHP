<?php
require 'src/Titular.php';
//HERANÇA
//É possível uma classe extender de outra, e com isso herdar todos os métodos. Para fazer isso utiliza-se: 

class Cliente extends Titular {
    public function __construct(
        string $cpf,
        string $nome,
        //Profissao $profissao,  //caso fosse PHP 8.1 poderia usar o tipo Profissao criado. 
        public readonly $id,     // O "public readonly" permite que a propriedade seja definida apenas 1x ao instanciar a classe em um objeto
        public readonly $segmento // Mas também permite acessar a propriedade sem utilização de métodos getters e setters

    ){
        parent::__construct($cpf, $nome); //ao instanciar a propriedade Cliente esse método passa para a classe Titular as propriedade que pertencem a ela
    
    }
}



