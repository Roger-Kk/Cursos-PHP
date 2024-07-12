<?php


Class Cpf {
    private string $numero;
    public function __construct(string $numero){
        /*$cpf = filter_var($cpf, filter: FILTER_VALIDATE_REGEXP, [
            'options'=>[
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9}{2}$/'
            ]
        ]);
        if ($cpf === false) {
        echo "Cpf inválido";
        exit();
        }*/
        $this->numero = $numero;
    }

    public function recuperaNumero(): string{
        return $this->numero;
    }

}