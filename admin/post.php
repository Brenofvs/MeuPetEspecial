<?php

use Source\Models\Post;
use Source\Support\Message;

require __DIR__ . "./../vendor/autoload.php";

$model = new Post;
$message = new Message;

$postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if (!$postData) {
} elseif (empty($postData["title"]) || empty($postData["body"]) || empty($postData["image"])) {
    $message->error("Ocorreu um erro, você precisa preencher todos os campos da matéria!");
} else {
    $postData = $model->bootstrap($postData["title"], $postData["body"], $postData["image"]);
    $postData->save();
    $message->success("A matéria foi cadastrada com sucesso!!!");
}

include "./forms/form-cadastro.php";
