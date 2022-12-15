<?php
require './TestPack/fsphp.php';
include './TestPack/script.php';
fullStackPHPClassName("Matérias");
/*
 * 
 */
fullStackPHPClassSession("Cadastro de Matérias", __LINE__);

use Source\Support\Message;
use Source\Models\Post;

$message = new Message;
$find = new Post;
?>

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <h1>Passar dados (string) do JavaScript para o PHP</h1>
    <button onclick="sendStrings()">Entre com o seu nome e sobrenome</button>

    <div id="demo"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        function sendStrings() {
            // define as variáveis nome e sobrenome
            let nome = prompt("Digite o seu nome");
            let sobrenome = prompt("Digite o seu sobrenome");

            // REQUISIÇÃO AJAX
            // cria o objeto XMLHttpRequest
            const xhttp = new XMLHttpRequest();
            // chama a função quando a requisição é recebida
            xhttp.onload = function() {
                document.getElementById("demo").innerHTML = this.responseText;
            }
            // faz a requisição AJAX - método POST
            xhttp.open("POST", "./TestPack/script.php");
            // adiciona um header para a requisição HTTP
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // especifica os dados que deseja enviar   
            xhttp.send("nome=" + nome + "&sobrenome=" + sobrenome);
        }
    </script>

</body>

</html>



<?php
var_dump($_POST);

// $findResult = $find->find("image = :img", "img={$var}");
// var_dump($findResult);


echo $message->render();


// echo $message->render() . "
// <form name='post' action='./test?post=true' method='post' enctype='multipart/form-data' novalidate>
//     <p style='margin-bottom: 10px; text-align: right'><a href='./test' title='Atualizar'>Atualizar</a></p>
//     <div class='col2'>
//         <input id='img-input' class='pl-4 form-control-file' type='file' name='file' value='' required>
//     </div>
//     <button>Enviar Agora!</button>
// </form>";
