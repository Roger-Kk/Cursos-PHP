<?php 

require "src/conexao-bd.php";
require "src/Modelo/produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

//----------------PRODUTOS CAFÉ-----------------------
//ATENÇÃO: tudo que for relacionado ao café está no modelo mais simples de ser feito, puxando do BD e já imprimindo no código
$sql1 = "SELECT * FROM php_primeira_aplicacao.serenatto WHERE tipo = 'Café' ORDER BY preco"; 
//a variável statement recebe o retorno do método query() da variável $pdo
$statement = $pdo -> query($sql1);
$produtosCafe = $statement->fetchAll(mode:PDO::FETCH_ASSOC);

//O método var_dump serve para imprimir detalhes do conteúdo da variável
//var_dump($produtosCafe);
//exit();


//----------------PRODUTOS ALMOÇO-----------------------
//ATENÇÃO: tudo que for relacionado ao almoço está no modelo mais adequado de ser feito, encapsulando o retorno na classe Produto 
//e ProdutoRepositorio e depois imprimindo no código

$produtosRepositorio = new ProdutoRepositorio($pdo);
$dadosAlmoco = $produtosRepositorio -> opcoesAlmoco();


/*
OBS: antes de estar no BD, a definição de produtos era definida no código. 

$produtosCafe = [
    [
        'nome' =>"Café Cremoso",
        'descricao' => "Café cremoso irresistivelmente suave e que envolve seu paladar",
        'preco' => "5.00",
        'imagem' => "img/cafe-cremoso.jpg"
    ],
    [
        'nome' =>"Café com Leite",
        'descricao' => "A harmonia perfeita do café e do leite, uma experiência reconfortante",
        'preco' => "2.00",
        'imagem' => "img/cafe-com-leite.jpg"
    ],
    [
        'nome' =>"Cappuccino",
        'descricao' => "Café suave, leite cremoso e uma pitada de sabor adocicado",
        'preco' => "7.00",
        'imagem' => "img/cappuccino.jpg"
    ],
    [
        'nome' =>"Café Gelado",
        'descricao' => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
        'preco' => "3.00",
        'imagem' => "img/cafe-gelado.jpg"
    ],
];


$produtosAlmoco = [
    [   
        'nome' => 'Bife',
        'descricao' => 'Bife, arroz com feijão e uma deliciosa batata frita',
        'preco' => 'R$ 27,90',
        'imagem' => 'img/bife.jpg'
    ],
    [   
        'nome' => 'Filé de peixe',
        'descricao' => 'Filé de peixe salmão assado, arroz, feijão verde e tomate.',
        'preco' => 'R$ 24.99',
        'imagem' => 'img/prato-peixe.jpg'
    ], 
    [
        'nome' => 'Frango',
        'descricao' => 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante',
        'preco' => 'R$ 23,99',
        'imagem' => 'img/prato-frango.jpg'
    ],
    [
        'nome' => 'Fettuccine',
        'descricao' => 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado',
        'preco' => 'R$ 22,90',
        'imagem' => 'img/fettuccine.jpg'
    ]
]

*/
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($produtosCafe as $cafe):?>
                <div class="container-produto">
                    <div class="container-foto">
                        <!--Quando era um array de arrays, usava essa estrutura para acessar cada elemento -->
                        <img src= "<?= "img/" . $cafe['imagem'] ?>" >    
                    </div>
                    <p>"<?= $cafe['nome'] ?>"</p>
                    <p>"<?= $cafe['descricao'] ?>"</p>
                    <p>"<?= "R$ " . number_format($cafe['preco'], decimals: 2) ?>"</p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach($dadosAlmoco as $almoco):?>
                <div class="container-produto">    
                    <div class="container-foto">
                        <!-- Após alteração do array de arrays $produtosCafe para array de objetos $dadosCafe acessa pelo getters da classe Produto -->
                        <img src= <?= $almoco -> getImagem2() ?>>
                    </div>
                    <p><?= $almoco -> getNome() ?></p>
                    <p><?= $almoco -> getDescricao() ?></p>
                    <p><?= $almoco -> getPrecoFormatado() ?></p>
                </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>
</html>