<?php 

    include('config.php');
 
    include('./pages/top.html');

    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    
    if(file_exists('./pages/'.$url.'.html')){
        include('./pages/'.$url.'.html');
    }else{
        include('pages/404.php');
    }

    include('./pages/bot.html');
    
?>