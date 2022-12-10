<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use Source\Core\Session;
use Source\Models\Admin;
use Source\Support\Message;

$userSession = new Session;
// $userSession->destroy();


if (!isset($_SESSION['user'])) {
    $userSession->set("user", "");
    header('Location: https://www.localhost/MeuPetEspecial/admin/');
} elseif ($_SESSION['user'] === "") {
    include "./login.php";
    $loginData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ?? null;
}

if (!empty($loginData['login']) && !empty($loginData['password'])) {
    $admin = new Admin;
    $admin->login($loginData['login'], $loginData['password']);

    if (is_null($admin->data)) {
        $message = new Message;
        $message->error("Usuário ou senha incorretos");
        echo $message->render();
    }
}

if (!empty($_SESSION['user'] && $_SESSION['user'] === 'admin')) {
    echo "logado";
}
