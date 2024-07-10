<?php

class Conta {
    private $titular;
//  private float $saldo = 0;   //Sempre que for instanciado um objeto Conta, o valor inicial do saldo será 0.
    private $saldo;
    private static $numeroDeContas=0; //propriedade estática (escopo global e não de uma instância de uma classe)

       //método construtor
       public function __construct(Titular $titular){
        $this->titular = $titular;
        $this->saldo = 0;
       // Conta::$numeroDeContas++; NomeClasse:: vai acessar um atributo estático da classe
        self::$numeroDeContas++;  //Também se utiliza a palavra self 
    }

    /*
    public function sacar($contaASacar, float $valorASacar){
        if ($valorASacar > $contaASacar ->saldo){
            echo "Saldo indisponível";
        } else {
            $contaASacar ->saldo -= $valorASacar;
        }
    }
        */
    //Outra forma de escrever o código acima é com o $this
    // $this aponta para o objeto instanciado a partir da classe que foi guardado na variável
    public function sacar(float $valorASacar){
        if ($valorASacar > $this ->saldo){
            echo "Saldo indisponível";
        } else {
            $this ->saldo -= $valorASacar;
        }
    }

    public function depositar(float $valorADepositar): void{
        if($valorADepositar < 0){
            echo "Valor precisa ser positivo.";
        } else {
            $this ->saldo += $valorADepositar;
        }
    }
    /*
    public function transferir (float $valorATransferir, Conta $contaDestino): void{
        if($valorATransferir > $this->saldo){
            echo "Saldo Indisponível";
        } else{
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
        }
    }*/


    //Melhor forma de escrever as funções excluindo o else{}, e usando o return; :
    public function transferir (float $valorATransferir, Conta $contaDestino): void{
        if($valorATransferir > $this->saldo){
            echo "Saldo Indisponível";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
        
    }

    public function recuperarSaldo(): float{
        return $this ->saldo;
    }

    public function recuperarNomeTitular():string{
        return $this->titular->recuperaNome();
    }

    public function recuperarCpfTitular():string{
        return $this->titular->recuperaCpf();
    }
  
  
    public static function recuperaNumeroDeContas(): int{
        //return Conta::$numeroDeContas;   A palavra 'self' é utilizada para se referir a classe no escopo global
        return self::$numeroDeContas;
    }

    //Quando uma instância deixa de existir, então executa o destruct
    public function __destruct(){
       self::$numeroDeContas--;
    }
}
/*Comandos no Terminal para instanciar uma classe e manipulá-la.

Instanciar uma classe: 
$variavel = new NomeClasse ();
Ex: 
$primeiraConta = new Conta();

Definir os valores dos atributos: 
$variavel -> atributo = valor;
Ex:
$primeiraConta -> cpfTitular = '058.801.289-03'
$primeiraConta -> saldo = 2000;
$primeiraConta -> nomeTitular = Roger Kolossoski;

Para ler os atributos: 
echo $primeiraConta -> saldo;
*/




