<?php

//Instanciando a classe que é utilizada para fazer a conexão com o banco de dados:
//Aceita 3 parametros: 
//- String de conexão = informa o driver que está utilizando com detalhes específicos do banco 
//de dados. PDO(dsn:'sqlite:host=.....dbname=....');
//- O Usuário PDO(dsn:'sqlite:host=.....dbname=....', $usuario);
//- A senha do usuário PDO(dsn:'sqlite:host=.....dbname=....', $usuario, $senha);
// e parâmetros extras: PDO(dsn:'sqlite:host=.....dbname=....', $usuario, $senha, []);

$pdo = new PDO(dsn:'sqlite:banco.sqlite');

echo 'Conectado'; 