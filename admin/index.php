<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use Source\Core\Session;

$userSession = new Session;
// $userSession->destroy();

if (!isset($_SESSION['user'])) {
    $userSession->set("user", "");
    header('Location: https://www.localhost/MeuPetEspecial/admin/');
} elseif ($_SESSION['user'] === "") {
    include "./login.php";
    $loginData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ?? null;
    if (!empty($loginData['login']) && !empty($loginData['password'])) {
        $userSession->set("user", $loginData['login']);
        header('Location: https://www.localhost/MeuPetEspecial/admin/');
    }
} else {
    // include "painel.php";
    echo "logado";
}
