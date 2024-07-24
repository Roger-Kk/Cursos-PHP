<<<<<<< HEAD
<?php

$filme = [
    'nome' => $_POST['nome'],
    'anoLancamento' => $_POST['ano'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero'],
];

file_put_contents('filme.json', json_encode($filme));

=======
<?php

$filme = [
    'nome' => $_POST['nome'],
    'anoLancamento' => $_POST['ano'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero'],
];

file_put_contents('filme.json', json_encode($filme));

>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
header('Location: /sucesso.php?filme=' . $filme['nome']);