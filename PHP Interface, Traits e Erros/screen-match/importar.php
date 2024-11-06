<<<<<<< HEAD
<?php

$caminhoArquivo = __DIR__ . '/filme.json';
$conteudoArquivoFilme = file_get_contents($caminhoArquivo);
$filme = json_decode($conteudoArquivoFilme, true);

var_dump($filme);
=======
<<<<<<< HEAD
<?php

$caminhoArquivo = __DIR__ . '/filme.json';
$conteudoArquivoFilme = file_get_contents($caminhoArquivo);
$filme = json_decode($conteudoArquivoFilme, true);

var_dump($filme);
=======
<?php

$caminhoArquivo = __DIR__ . '/filme.json';
$conteudoArquivoFilme = file_get_contents($caminhoArquivo);
$filme = json_decode($conteudoArquivoFilme, true);

var_dump($filme);
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
