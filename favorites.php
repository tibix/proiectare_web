<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Favorite.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('autentificare.php');
}


if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $db = new Database();
    $art = new Article($db);
    $fav = new Favorite($db);

    $errors = array();

    /*
     * Check if already isFavorite
     */

    $article = $art->getArticleById($id);

    if($article)
    {
        $bmi = $id;
        if(!empty($_GET['action']))
        {
            if ($_GET['action'] === 'add')
            {
                if($fav->isFavorite($bmi))
                {
                    $errors[] = 'This article is already added to favorites!';
                } else {
                    $new_fav = $fav->addToFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'Error adding article to favorites: ' . $new_fav;
                    }
                }
            }

            if ($_GET['action'] === 'remove')
            {
                if($fav->isFavorite($bmi))
                {
                    $new_fav = $fav->removeFromFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'Error removing article from favorites: ' . $new_fav;
                    }
                } else {
                    $errors[] = 'This article is not part of favorites!';
                }
            }
        }
    } else {
        $bmi = null;
        $errors[] = "This article does not exists!";
    }

    if(empty($errors))
    {
        redirect($_SERVER["HTTP_REFERER"]);
    } else {
        show_errors($errors);
    }
} else {

    $db = new Database;
    $bm = new Article($db);
    $fav = new Favorite($db);

    $user_favs = $fav->getAllFavorites($_SESSION['user_id']);

    echo '<div class="row m-3">';
    if($user_favs){
        foreach($user_favs as $u_fav)
        {?>
            <div class="col-sm-3">
                <div class="card text-center mb-4">
                    <div class="card-header">
                        <?=$u_fav['title']?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?=$u_fav['title']?></h5>
                        <p class="card-text"><?=substr($u_fav['content'], 0,50)?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="articol.php?id=<?=$u_fav['article_id']?>" target="_blank" class="btn btn-outline-secondary my-2">Go to Article</a>
                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$u_fav['article_id']?>&action=remove"><i class="fa-solid fa-thumbs-up"></i></a>

                    </div>
                </div>
            </div>
            <?php
        }
    }
}
