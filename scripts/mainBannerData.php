<?php
require __DIR__ . "./../vendor/autoload.php";

use Source\Models\Post;

$post = new Post;

$imgSrc =
    str_replace("https://www.localhost/MeuPetEspecial", ".", filter_input(INPUT_POST, 'bannerSrc', FILTER_SANITIZE_SPECIAL_CHARS));

$result = $post->find("image = :img", "img={$imgSrc}");

// var_dump($imgSrc, $result);

echo "<div class='main-banner-container'>
    <h3 class='font-menu cor-11'>{$result->title}</h3>
    <p class='font-text-m'>{$result->body}</p>
    <a href='#' class='botao'>Saiba Mais</a>
</div>";
