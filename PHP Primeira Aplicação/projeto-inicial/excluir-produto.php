<?php 

require "src/conexao-bd.php";
require "src/Modelo/produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
//$produtoRepositorio->deletar($_GET['id']);    recuperar o id pelo método _GET que é passado pela URL não é seguro, então utilizamos o POST
$produtoRepositorio->deletar($_POST['id']);

//Após excluir o php envia um cabeçalho http para o navegador, informando a página que deve recarregar
header(header: "Location: admin.php");

//O método global _GET faz a leitura de parâmetros da URL
//var_dump($_GET);
?>