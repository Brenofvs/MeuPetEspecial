<?php

use Source\Models\Post;
use Source\Support\Message;

require __DIR__ . "./../../vendor/autoload.php";

$model = new Post;
$message = new Message;
$folder = "../imagens/uploads/";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);
$fileDir = "";

if ($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES["file"];

    $allowedTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "image/webp",
        "application/pdf"
    ];

    $newFilename = time() . mb_strstr($fileUpload['name'], ".");

    if (in_array($fileUpload['type'], $allowedTypes)) {
        if (move_uploaded_file($fileUpload['tmp_name'], $folder . "{$newFilename}")) {
            $fileDir = substr($folder . "{$newFilename}", 1,);
            $fileUpload = array();
        } else {
            $message->error("Erro inesperado!");
        }
    } else {
        $message->error("Tipo de arquivo não permitido!");
    }
} elseif ($getPost) {
    $message->error("Whoops, parece que o arquivo é muito grande!");
} else {
    if ($_FILES) {
        $message->error("Selecione um arquivo antes de enviar!");
    }
}

$postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


if ($postData) {
    if (empty($postData["title"]) || empty($postData["body"]) || empty($fileDir)) {
        $message->error("Ocorreu um erro, você precisa preencher todos os campos da matéria!");
    } else {
        $postData = $model->bootstrap($postData["title"], $postData["body"], $fileDir);
        $postData->save();
        $message->success("A matéria foi cadastrada com sucesso!!!");
    }
}

include "./forms/form-cadastro.php";
