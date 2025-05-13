<?php 

//O autoload é um recurso do PHP que recebe uma função que pelo nome da classe + seu namespace, retorna o caminho da classe e realiza o require;
//Assim, basta fazer o require do autoload.php nos arquivos e não ficar fazendo o require de cada classe em cada arquivo. 

spl_autoload_register(function(string $nomeCompletoDaClasse){
    //echo $nomeCompletoDaClasse;
    //exit();
    $caminhoArquivo = str_replace('Alura\\Banco', 'src', $nomeCompletoDaClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo .= '.php';

    if(file_exists($caminhoArquivo)){
        require_once $caminhoArquivo;
    }

});