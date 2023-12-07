<?php

session_start();
include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Favorite.php';
require_once 'classes/User.php';
require_once 'classes/Notification.php';

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
                if($fav->isFavorite($bmi, $_SESSION['user_id']))
                {
                    $errors[] = 'Acest articol este deja adaugat la favorite!';
                } else {
                    $new_fav = $fav->addToFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'A aparut o eroare la adaugarea articolului la favorite: ' . $new_fav;
                    }
                }
            }

            if ($_GET['action'] === 'remove')
            {
                if($fav->isFavorite($bmi, $_SESSION['user_id']))
                {
                    $new_fav = $fav->removeFromFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'A aparut o eroarea la stergerea articolului din favorite: ' . $new_fav;
                    }
                } else {
                    $errors[] = 'Acest articol nu face parte din favorite!';
                }
            }
        }
    } else {
        $bmi = null;
        $errors[] = "Acest articol nu exista!";
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
                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$u_fav['article_id']?>&action=remove"><i class="fa-solid fa-heart"></i></a>

                    </div>
                </div>
            </div>
            <?php
        }
    }
    echo '</div>';
}

include 'templates/footer.php';