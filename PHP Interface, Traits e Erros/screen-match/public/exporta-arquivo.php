<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
<?php

$filme = [
    'nome' => $_POST['nome'],
    'anoLancamento' => $_POST['ano'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero'],
];

file_put_contents('filme.json', json_encode($filme));

<<<<<<< HEAD
=======
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
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
header('Location: /sucesso.php?filme=' . $filme['nome']);