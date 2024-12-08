<?php

//Estabelecer a conexão com o MYSQL via PDO: 
$host = 'localhost';
$dbname = 'padrao_mvc';
$username = 'root';
$password = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//var_dump($id);
//die();
$video = [
    'url' => "",
    'title' => "",
];

if($id !== false && isset($id)){
    try{
        $pdo = new PDO("mysql:host = $host; dbname = $dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM padrao_mvc.videos WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $video = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }
}

//tratando as variáveis caso receba um valor inesperado de tipo diferente de array: 
    if (is_array($video) && isset($video['url'])) {
        $valorUrl = $video['url'];
    } else {
        $valorUrl = null; // ou um valor padrão
    } 
    if (is_array($video) && isset($video['title'])){
        $valorTitulo = $video['title'];
    } else {
        $valorTitulo = null; // ou um valor padrão
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="/"></a>

            <div class="cabecalho__icones">
                <a href="./novo-video" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <main class="container">

        <form class="container__formulario"  
            method="post">
            <!-- Essa action estava dentro do formulário, e não é mais necessária uma vez que se usa o frontcontroler no arquivo index.php -->
            <!-- action="<?= $id !== false && isset($id) ? '/editar-video.php?id=' . $id : '/novo-video.php'; ?> -->"
            <h2 class="formulario__titulo">Envie um vídeo!</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name= 'url'
                        value = "<?= $valorUrl;?>"
                        class="campo__escrita"
                        required
                        placeholder="Exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" 
                        id='url' />
                </div>

                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input 
                        name="titulo" 
                        value = "<?= $valorTitulo;?>"
                        class="campo__escrita" 
                        required 
                        placeholder="Escreva o nome do vídeo"
                        id='titulo' />
                </div>
                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>