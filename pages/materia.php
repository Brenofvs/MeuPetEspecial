<style>
    .trigger {
        text-align: center;
        margin: 120px;
    }
</style>

<?php
if (isset($_GET['id'])) {
    $materiaId = intval(filter_input(INPUT_GET, "id"));
    $previewId = $materiaId - 1;
    $nextId = $materiaId + 1;
} else {
    $materiaId = "";
}
$materia = $post->findById($materiaId);
$preview = $post->findById($previewId);
$next = $post->findById($nextId);
if (!is_null($materia)) {
    $crtTime =
        new DateTimeImmutable($materia->created_at);
    if ($materia->updated_at) {
        $updTime =
            new DateTimeImmutable($materia->updated_at);
        $pUp = " || Última atualização " . $updTime->format('d-m-Y H:i:s') . "";
        $mz = "m-0";
    } else {
        $pUp = "";
    }
?>

    <main id="home" class="load-animation">
        <div class="main-home container-body">
            <div class="main-section-container">
                <div class="main-section main-materia">
                    <h1 class="home-title font-title-x"><?= $materia->title ?></h1>
                    <p class="font-text-m post-data">Postado em: <?= $crtTime->format('d-m-Y H:i:s'), $pUp ?></p>
                    <div class="main-banner">
                        <img src="<?= $materia->image ?>" alt="">
                    </div>
                    <div class="font-text-m materia-body"><?= $materia->body ?></div>
                    <div class="afters" style="margin: 20px 0;">
                        <div class="btn-detail">
                            <div class="btns">
                                <div class="btn preview">
                                    <?php
                                    if (!is_null($preview)) {
                                        echo "<a href='./materia&id={$preview->id}' class='botao'>Anterior</a>
                                        <p class='font-text-m'>" . mb_strimwidth($preview->title, 0, 60) . "</p>";
                                    }
                                    ?>
                                </div>
                                <div class="btn next">
                                    <?php
                                    if (!is_null($next)) {
                                        echo "<a href='./materia&id={$next->id}' class='botao'>Próxima</a>
                                        <p class='font-text-m'>" . mb_strimwidth($next->title, 0, 60) . "</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="others">
                            <h1 class="others-title">Outras Postagens</h1>
                            <div class="others-cards">
                                <?php

                                $others = $post->All(4);

                                foreach ($others as $posts) {
                                    $crtTimeOth =
                                        new DateTimeImmutable($posts->created_at);
                                    echo "<div class='other-card'>
                                <div class='others-img'>
                                    <img src='{$posts->image}' alt=''>
                                </div>
                                <div class='other-text'>
                                    <h1 class='font-text-sm' style='font-weight: 500;'>" . mb_strimwidth($posts->title, 0, 60) . "</h1>
                                    <p class='font-text-sm'>Postado em " . $crtTimeOth->format('d-m-Y') . "</p>
                                    <a href='./materia&id={$posts->id}' class='botao botao-pet'>Leia Mais...</a>
                                </div>
                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <aside id="aside" class="main-aside aside-materia">
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
    <?php
} else {
    $message->error("Ops, parece que não há nenhuma matéria a ser exibida, você será redirecionado a página inicial!");
    echo $message->render();
    header("Refresh: 5; url=" . CONF_URL_BASE . "");
}
    ?>