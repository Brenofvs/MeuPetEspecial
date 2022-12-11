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
// $userSession->destroy();


if (!isset($_SESSION['user'])) {
    $userSession->set("user", "");
} elseif ($_SESSION['user'] === "") {
    include "./login.php";
}

if (!empty($_SESSION['user'] && $_SESSION['user'] === 'admin')) {
    $urlAdmin = isset($_GET['url']) ? $_GET['url'] : 'home';
    include "./sidebar.php";

    if (file_exists('./' . $urlAdmin . '.php')) {
        include('./' . $urlAdmin . '.php');
    } else {
        include('../pages/404.php');
    }
}

?>