<?php

session_start();
include 'core/utils.php';
if(!logged_in())
{
    redirect('autentificare.php');
}

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Favorite.php';
require_once 'classes/User.php';
require_once 'classes/Notification.php';

include 'templates/header.php';

if(logged_in()){
    include 'templates/t_'.$_SESSION['role'].'.php';
} else {
    redirect("autentificare.php");
}

include 'templates/footer.php';
