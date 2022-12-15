<?php
// recebe os valores da requisição POST
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);

if ($nome && $sobrenome) {
    echo "<br/></br>";
    echo "Meu nome é: " . $nome;
    echo "<br/></br>";
    echo "Meu sobrenome é: " . $sobrenome;
}
