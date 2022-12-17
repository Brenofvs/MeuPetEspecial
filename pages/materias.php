<section id="home" class="load-animation">
    <div class="materia-title">
        <h1 class="materias-title font-title-xl container-body">Nossas Matérias</h1>
    </div>
    <div class="cards-container">
        <div class="cards">
            <?php
            $all = $post->All(60);
            if (!is_null($all)) {
                foreach ($all as $posts) {
                    echo "<div class='card' style='margin-bottom: clamp(1.25rem, 2vw, 2.5rem);'>
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
        <!-- <a href="#" class="botao botao-mais">Mostrar Mais</a> -->
    </div>
</section>