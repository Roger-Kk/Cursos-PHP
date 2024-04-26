<?php

$idade = 18; 
$qntPessoas = 1;
echo "Autorizado em caso de maioridade ou acompanhado." . PHP_EOL;


if ($idade >= 18){
    echo "Você é de maioridade" . PHP_EOL;
    echo "Autorizado."; 
} else {
   if($qntPessoas > 1) {
    echo "Menor acompanhado. Autorizado.";
   } else {
    echo "Você só está autorizado se for de maioridade ou estar acompanhado."; 
    }
}
echo "\n\n"; 

// O código pode ser escrito de uma melhor forma: 
    if ($idade >= 18){
        echo "Você é de maioridade" . PHP_EOL;
        echo "Autorizado." . PHP_EOL; 
    }else if($qntPessoas > 1) 
        echo "Menor acompanhado. Autorizado." . PHP_EOL;
    else 
        echo "Você só está autorizado se for de maioridade ou estar acompanhado." . PHP_EOL; 
    
echo "A próxima linha não faz parte da condição caso tire as chaves.";
    

//IF com operador ternário: 
//$variavel = $condicao ? $valorSeVerdadeiro : $valorSeFalso;
echo "\n\n";
$idade = 15;
$mensagem = $idade < 18 ? 'Você é menor de idade' : 'Você é maior de idade';
echo $mensagem;


