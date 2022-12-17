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
                    if (!is_null($all)) {
                        foreach ($all as $posts) {
                            echo "                        
                        <div class='pic-mask'>
                            <img class='pic-thumb border' src='{$posts->image}' alt=''>
                        </div>";
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
            include("./pages/aside.php")
            ?>
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
            if (!is_null($all)) {
                foreach ($all as $posts) {
                    echo "<div class='card'>
                <img src='{$posts->image}' alt=''>
                <h1 class='pet-title font-subtitle'>" . mb_strimwidth("{$posts->title}", 0, 40, "...") . "</h1>
                <p class='pet-desc font-text-m cor-8'>" . mb_strimwidth("{$posts->body}", 0, 150, "...") . "</p>
                <a href='./materia&id={$posts->id}' class='botao botao-pet'>Leia Mais...</a>
                </div>";
                }
            } else {
                $message->error("Parece que não há nenhuma matéria a ser exibida ainda :(");
                echo $message->render();
            }
            ?>
        </div>
        <a href="materias" class="botao botao-mais">Outras matérias</a>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./scripts/home-main-slider.js"></script>