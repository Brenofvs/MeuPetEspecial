<?php
require __DIR__ . "./../vendor/autoload.php";

use Source\Models\Post;

$post = new Post;

$imgSrc =
    str_replace("https://www.localhost/MeuPetEspecial", ".", filter_input(INPUT_POST, 'bannerSrc', FILTER_SANITIZE_SPECIAL_CHARS));

$result = $post->find("image = :img", "img={$imgSrc}");

echo "<div class='main-banner-container'>
    <h3 class='font-menu cor-11'>" . mb_strimwidth("{$result->title}", 0, 40, "...") . "</h3>
    <p class='font-text-m'>" . mb_strimwidth("{$result->body}", 0, 150, "...") . "</p>
    <a href='./materia&id={$result->id}' class='botao'>Saiba Mais</a>
</div>";
