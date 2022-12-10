<?php
require './TestPack/fsphp.php';
fullStackPHPClassName("Matérias");
/*
 * 
 */
fullStackPHPClassSession("Cadastro de Matérias", __LINE__);

use Source\Models\Post;
use Source\Support\Message;

require __DIR__ . "./../vendor/autoload.php";

$model = new Post;
$message = new Message;

$postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

var_dump($postData);

if (!$postData) {
} elseif (empty($postData["title"]) || empty($postData["body"]) || empty($postData["image"])) {
    $message->error("Ocorreu um erro, você precisa preencher todos os campos da matéria!");
    echo $message->render();
} else {
    $postData = $model->bootstrap($postData["title"], $postData["body"], $postData["image"]);
    $postData->save();
}

echo "<form name='post' action='./test' method='post' enctype='multipart/form-data' novalidate>
    <p style='margin-bottom: 10px; text-align: right'><a href='./test' title='Atualizar'>Atualizar</a></p>
    <div class='col2'>
        <input type='text' name='title' value='' placeholder='Titulo' required />
        <input type='text' name='body' value='' placeholder='Materia' required />
        <input type='text' name='image' value='' placeholder='imagem' required />
    </div>
    <button>Enviar Agora!</button>
</form>";
