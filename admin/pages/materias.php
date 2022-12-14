<?php

use Source\Support\Message;
use Source\Models\Post;

$message = new Message;
$post = new Post;

?>

<style>
    .card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .img-fluid {
        width: 100%;
        height: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        object-position: center;
    }
</style>

<main class="content">
    <div class="row">
        <div class="col-12 d-flex mb-4 justify-content-between">
            <h1 class="fs-1">Matérias do site</h1>
            <a href='?page=post' class='btn btn-success d-inline-flex justify-content-center align-items-center fs-3'><i class='align-middle me-2' data-feather='plus-square'></i>Nova Matéria</a>
        </div>
        <?php
        $all = $post->All(50);
        if (!is_null($all)) {
            foreach ($all as $posts) {
                $pUp = "";
                $mz = "";
                $crtTime =
                    new DateTimeImmutable($posts->created_at);
                if ($posts->updated_at) {
                    $updTime =
                        new DateTimeImmutable($posts->updated_at);
                    $pUp = "<p class='card-text'><small class='text-muted'>Atualizado em " . $updTime->format('d-m-Y H:i:s') . "</small></p>";
                    $mz = "m-0";
                }
                echo "<div class='col-12 col-xl-6 col-xxl-4'>
                <div class='card mb-3' style='max-width: 540px;'>
                <div class='row g-0'>
                    <div class='col-md-5'>
                        <img src='.{$posts->image}' class='img-fluid rounded-start' alt='...'>
                    </div>
                    <div class='col-md-7'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$posts->title}</h5>
                            <p class='card-text'>" . filter_var($posts->body, FILTER_SANITIZE_SPECIAL_CHARS) . "</p>
                            <p class='card-text {$mz}'><small class='text-muted'>Criado em " . $crtTime->format('d-m-Y H:i:s') . "</small></p>
                            {$pUp}
                            <a href='?page=edit&postId={$posts->id}' class='btn btn-warning d-inline-flex justify-content-center align-items-center text-body'><i class='align-middle me-2' data-feather='edit'></i>Editar</a>
                            <a href='?page=delete&postId={$posts->id}' class='btn btn-danger d-inline-flex justify-content-center align-items-center'><i class='align-middle me-2' data-feather='trash-2'></i>Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>";
            }
        } else {
            $message->error("Parece que não há nenhuma matéria cadastrada :(");
            echo $message->render();
        }

        ?>
    </div>
</main>