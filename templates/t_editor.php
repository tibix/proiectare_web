<?php

$db = new Database();
$arts = new Article($db);
$fav = new Favorite($db);
$notify = new Notification($db);

$notifications = $notify->getNotifications($_SESSION['user_id']);
$articles = $arts->getAllArticles();

$my_articles = [];
$drafts = [];
$other_articles = [];

foreach($articles as $article)
{
    if($article['status_id'] == 1) {
        $other_articles[] = $article;
    } else if ($article['status_id'] == 2){
        $drafts[] = $article;
    }

}

function compare($a, $b)
{
    return ($b['featured']<=> $a['featured']);
}

usort($my_articles, "compare");
usort($other_articles, "compare");

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-sm-8 bg-white mr-3">
            <h1 class="text-center">Articole de verificat</h1>
            <div class="row mx-3">
                <div class="row">
                    <?php foreach($drafts as $dr):?>
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card my-2">
                                <div class="card-header text-white bg-info">
                                    De verificat
                                    <?php
                                    $notifications = $notify->hasNotification($dr['id'], $_SESSION['user_id']);

                                    if($notifications)
                                    {
                                        echo "<span class=\"badge text-bg-danger\"> <i class=\"fa fa-bell\"></i>". count($notifications) ." </span>&nbsp;&nbsp;";
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$dr['title']?></h5>
                                    <p class="card-text"><?=substr($dr['content'], 0, 100);?></p>
                                    <a href="articol.php?id=<?=$dr['id']?>" class="btn btn-outline-info">Verifica Articol</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4 ml-3">
            <h1 class="text-center">Articole active</h1>
            <div class="row mx-3">
                <?php foreach($other_articles as $oa){
                    if($oa['featured'] == 1){
                        ?>
                        <div class="col-sm-12">
                            <div class="card my-2">
                                <div class="card-header bg-dark text-light">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$oa['title']?></h5>
                                    <p class="card-text"><?=substr($oa['content'], 0, 100).' ...';?></p>
                                    <a href="articol.php?id=<?=$oa['id']?>" class="btn btn-outline-warning">Citeste</a>
                                    <?php if($fav->isFavorite($oa['id'], $_SESSION['user_id'])) { ?>
                                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$oa['id']?>&action=remove"><i class="fa-solid  fa-thumbs-up"></i></a>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-secondary" href="favorites.php?id=<?=$oa['id']?>&action=add"><i class="fa-regular fa-thumbs-up"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card my-2">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$oa['title']?></h5>
                                    <p class="card-text"><?=substr($oa['content'], 0, 100).' ...';?></p>
                                    <a href="articol.php?id=<?=$oa['id']?>" class="btn btn-outline-warning">Citeste</a>
                                    <?php if($fav->isFavorite($oa['id'], $_SESSION['user_id'])) { ?>
                                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$oa['id']?>&action=remove"><i class="fa-solid  fa-thumbs-up"></i></a>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-secondary" href="favorites.php?id=<?=$oa['id']?>&action=add"><i class="fa-regular fa-thumbs-up"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } }?>
            </div>
        </div>
    </div>
</div>