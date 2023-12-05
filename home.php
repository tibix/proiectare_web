<?php

session_start();
include 'templates/header.php';

if(!logged_in())
{
    redirect('autentificare.php');
}


require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Favorite.php';
require_once 'classes/User.php';

if(logged_in()){
    $db = new Database();
    $arts = new Article($db);
    $fav = new Favorite($db);

    include 'templates/t_'.$_SESSION['role'].'.php';
} else {
    redirect("autentificare.php");
}

include 'templates/footer.php';
