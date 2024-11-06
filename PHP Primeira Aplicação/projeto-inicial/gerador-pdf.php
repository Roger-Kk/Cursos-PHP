<?php 

    //Para usar o gerador de pdf das bibliotecas do PHP, acessar o site packagist.org e selecionar dompdf/dompdf, executanto o comando no terminal: 
    // composer require dompdf/dompdf;

    require "vendor/autoload.php";

    //Dompdf namespace
    use Dompdf\Dompdf;

    // instanciando um objeto Dompdf
    $dompdf = new Dompdf();

    //iniciando um buffer de saída, armazenando o 'require' significa que o código irá armazenar essa ação só pra quando for chamada
    ob_start();  
    require "conteudo-pdf.php"; 
    $html = ob_get_clean(); //pega o conteúdo do buffer e limpa ele para não deixar nada acumulado



    $dompdf -> loadHtml(str: "Hello World");

    $dompdf -> setPaper(size: 'A4');

    $dompdf -> render();

    $dompdf-> stream();

?>