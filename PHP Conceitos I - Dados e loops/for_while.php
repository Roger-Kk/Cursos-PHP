<?php
//WHILE
$contador = 1;
while ($contador <= 15){
    echo "#$contador".PHP_EOL;
    $contador = $contador + 1;
}
echo "\n\n"; 

//FOR
for($contador = 1; $contador <= 15; $contador = $contador +1){
    echo "#$contador". PHP_EOL;
}

//código otimizado: 
echo "\nCódigo otimizado: \n";
for($contador= 1; $contador <= 15; $contador++){
    echo "#$contador". PHP_EOL;
}

//em caso de excessão no for: 
for($contador= 1; $contador <= 15; $contador++){
    if($contador==13){
        continue;
    }
    echo "#$contador". PHP_EOL;
}

//em caso de necessidade de parar o loop numa condição for: 
for($contador= 1; $contador <= 15; $contador++){
    if($contador==13){
        break;
    }
    echo "#$contador". PHP_EOL;
}


