<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Painel de administração - MeuPetEspecial">
    <meta name="Brenofvs" content="CMS">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Painel Admin</title>

    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/message.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use Source\Core\Session;

$userSession = new Session;

if (!isset($_SESSION['user'])) {
    $userSession->set("user", "");
    header("Location: " . CONF_URL_ADMIN);
} elseif ($_SESSION['user'] === "") {
    include "./login.php";
}

if (!empty($_SESSION['user'] && $_SESSION['user'] === 'admin')) {
    include "./sidebar.php";
    $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '?page=dashboard';
    $url_components = parse_url($url);
    if (isset($url_components['query'])) {
        parse_str($url_components['query'], $urlAdmin);
        if ($urlAdmin['page'] === 'login') {
            header("Location: " . CONF_URL_ADMIN);
        }
    } else {
        $urlAdmin['page'] = 'dashboard';
    }
    if (file_exists('./pages/' . $urlAdmin['page'] . '.php')) {
        include('./pages/' . $urlAdmin['page'] . '.php');
    } else {
        include('../pages/404.php');
    }
    if ($urlAdmin['page'] === 'logout') {
        $userSession->destroy();
        header("Location: " . CONF_URL_ADMIN);
    }
}

?>