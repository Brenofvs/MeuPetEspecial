<?php
require './TestPack/fsphp.php';
fullStackPHPClassName("Matérias");
/*
 * 
 */
fullStackPHPClassSession("Cadastro de Matérias", __LINE__);

use Source\Support\Message;
use Source\Models\Post;

$message = new Message;
$post = new Post;

$post->all();

var_dump($post);
echo $message->render();


// echo $message->render() . "
// <form name='post' action='./test?post=true' method='post' enctype='multipart/form-data' novalidate>
//     <p style='margin-bottom: 10px; text-align: right'><a href='./test' title='Atualizar'>Atualizar</a></p>
//     <div class='col2'>
//         <input id='img-input' class='pl-4 form-control-file' type='file' name='file' value='' required>
//     </div>
//     <button>Enviar Agora!</button>
// </form>";
