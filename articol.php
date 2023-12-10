<?php

session_start();

include 'core/utils.php';
require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';
require_once 'classes/Notification.php';
require_once 'classes/Favorite.php';
include 'templates/header.php';

if(!logged_in()){
    redirect('autentificare.php');
}

if(!empty($_GET))
{
    $db = new Database();
    $user = new User($db);
    $arts = new Article($db);
    $fav = new Favorite($db);
    $notify = new Notification($db);

    $id = $_GET['id'];

    $articol = $arts->getArticleById($id);
    
    if($articol){
        $notifications = $notify->getAllArticleNotifications($articol['id']);
        $autor = $user->getAuthorById($articol['user_id']);
        $cat = $arts->getCategoryById($articol['category_id']);
        foreach ($autor as $a) { $author = $a['f_name'] . " " . $a['l_name']; };

        if($_SESSION['role'] == 'editor' || $_SESSION['role'] == 'administrator')
        {
            include 'templates/t_articol_editor.php';
        } else if ($articol['user_id'] == $_SESSION['user_id']) {
            include 'templates/t_articol_owner.php';
        } else {
            include 'templates/t_articol.php';
        }

    } else {
        show_errors(['Articolul nu exista', 'Click <a href="index.php" class="text-dark">aici</a> pentru a merge la pagina principala']);
    }
} else {
        show_errors(['Nici un articol selectat!', 'Click <a href="index.php" class="text-dark">aici</a> pentru a merge la pagina principala']);
}

include 'templates/footer.php';