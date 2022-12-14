<?php
require __DIR__ . "./vendor/autoload.php";

use Source\Support\Message;
use Source\Models\Post;

$message = new Message;
$post = new Post;
$url = isset($_GET['url']) ? $_GET['url'] : 'home';

if ($url === "test") {
    include('./TestPack/' . $url . '.php');
} else {

    include('./pages/top.php');

    if (file_exists('./pages/' . $url . '.php')) {
        include('./pages/' . $url . '.php');
    } else {
        include('pages/404.php');
    }

    include('./pages/bot.php');
}
