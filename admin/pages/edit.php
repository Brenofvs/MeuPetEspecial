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
if (isset($_GET['postId'])) {
    $postId = intval(filter_input(INPUT_GET, "postId"));
} else {
    $postId = '';
}
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
}

$postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$postUpdt = $model->findById($postId);

if ($postData) {
    if (!empty($postData["title"]) || !empty($postData["body"]) || !empty($fileDir)) {

        if (!empty($postData['title'])) {
            $postUpdt->title = $postData['title'];
        }

        if (!empty($postData['body'])) {
            $postUpdt->body = $postData['body'];
        }

        if (!empty($fileDir)) {
            unlink("." . $postUpdt->image);
            $postUpdt->image = $fileDir;
        }

        if ($postUpdt != $model->findById($postId)) {
            $postUpdt->save();
            $message->success("Matéria atualizada com sucesso!");
        } else {
            $message->warning("Parece que essa matéria já foi atualizada!");
        }
    } else {
        $message->warning("Parece que essa matéria já está atualizada!");
    }
}

include "./forms/form-edit.php";
