<?php

session_start();

include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/Article.php';

if(!logged_in())
{
    redirect('autentificare.php');
}

if($_SESSION['role'] != "editor" && $_SESSION['role'] != "administrator")
{
    redirect('home.php');
}

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $db = new Database();
    $art = new Article($db);

    $errors = array();

    $article = $art->getArticleById($id);

    if($article)
    {
        $featured = (int)$article['featured'];
        if($featured)
        {
            $demote = $art->removeFeaturedArticle($article['id']);
            if($demote)
            {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                echo $demote;
            }
        } else {
            $promote = $art->setFeaturedArticle($article['id']);
            if($promote) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                echo $promote;
            }
        }
    } else {
        echo 'Nah';
    }

}
include 'templates/footer.php';