<?php

use Source\Support\Message;
use Source\Models\Post;

$message = new Message;
$post = new Post;

?>

<main id="home" class="load-animation">
    <div class="main-home container-body">
        <h1 class="home-title font-title-xl">Últimas Matérias</h1>
        <div class="main-section-container">
            <div class="main-section">
                <div class="main-banner">
                    <span id="arrowLeft"><img src="./imagens/dec/seta-left.svg" alt=""></span>
                    <img id="main-banner" src="./imagens/pets/pet07.png" alt="">
                    <span id="arrowRight"><img src="./imagens/dec/seta-right.svg" alt=""></span>
                    <div id="main-banner-data" class="main-banner-data">

                    </div>
                </div>

                <div class="picture">

                    <?php

                    $all = $post->All(5);
                    foreach ($all as $user) {
                        echo "                        
                        <div class='pic-mask'>
                            <img class='pic-thumb border' src='{$user->image}' alt=''>
                        </div>";
                    }
                    ?>

                </div>
            </div>
            <aside id="aside" class="main-aside">
                <div class="aside-container">
                    <h1 class="font-title-m">categorias</h1>
                    <a class="font-menu" href="#"><span class="dec">Histórias de leitores</span></a>
                    <a class="font-menu" href="#"><span class="dec">Matérias especiais</span></a>
                    <a class="font-menu" href="#"><span class="dec">Patologias e condições</span></a>
                    <a class="font-menu" href="#"><span class="dec">Petit, o grande motivador do site</span></a>
                    <a class="font-menu" href="#"><span class="dec">Vida, a cachorrinha atropelada</span></a>
                    <a class="font-menu" href="#"><span class="dec">Categoria Livre</span></a>
                </div>
                <div class="aside-container">
                    <h1 class="font-title-m">Redes sociais</h1>
                    <a href="#" class="font-menu aside-social-media"><span><img src="./imagens/logo/facebook-logo.svg">Facebook</span></a>
                    <a href="#" class="font-menu aside-social-media"><span><img src="./imagens/logo/youtube-logo.svg">Youtube</span></a>
                    <a href="#" class="font-menu aside-social-media"><span><img src="./imagens/logo/insta-logo.svg">Instagram</span></a>
                </div>
                <div class="aside-container">
                    <h1 class="font-title-m">Anúncio dos patrocinadores</h1>
                </div>
            </aside>
        </div>
    </div>
</main>

<section class="js-scroll">
    <div class="home-materias-title container-body">
        <p class="font-text-m cor-8">Buscando ajuda? Confira nossas matérias</p>
        <h1 class="home-title font-title-xl">Mais Visitadas</h1>
    </div>
    <div class="cards-container">
        <div class="cards">
            <?php

            $all = $post->All(6);
            foreach ($all as $user) {
                echo "<div class='card'>
                <img src='{$user->image}' alt=''>
                <h1 class='pet-title font-subtitle'>{$user->title}</h1>
                <p class='pet-desc font-text-m cor-8'>{$user->body}</p>
                <a href='./materias?id={$user->id}' class='botao botao-pet'>Leia Mais...</a>
                </div>";
            }
            ?>
            <!-- <div class="card">
                <img src="./imagens/pets/pet01.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div>
            <div class="card">
                <img src="./imagens/pets/pet02.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div>
            <div class="card">
                <img src="./imagens/pets/pet03.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div>
            <div class="card">
                <img src="./imagens/pets/pet04.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div>
            <div class="card">
                <img src="./imagens/pets/pet05.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div>
            <div class="card">
                <img src="./imagens/pets/pet06.jpg" alt="">
                <h1 class="pet-title font-subtitle">Nome do Pet</h1>
                <p class="pet-desc font-text-m cor-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <a href="#" class="botao botao-pet">Leia Mais...</a>
            </div> -->
        </div>
        <a href="materias" class="botao botao-mais">Outras matérias</a>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./scripts/home-main-slider.js"></script>