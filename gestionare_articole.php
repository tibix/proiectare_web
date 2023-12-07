<?php

session_start();

include 'core/utils.php';
require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/Notification.php';

include 'templates/header.php';
if(!logged_in() || $_SESSION['role'] == 1){
    redirect("autentificare.php");
}

$db = new Database();
$arts = new Article($db);
if($_SESSION['role'] == 'jurnalist'){
    $articole = $arts->getAllArticles($_SESSION['user_id']);
} else {
    $articole = $arts->getArticleByStatus(2);
}

$notify = new Notification($db);

if($_SESSION['role'] == 'jurnalist'){
    if(!$articole){
    ?>
        <div class="container-fluid my-4">
            <h3 class="text-center">Momentan nu ai nici un articol creat!</h3>
            <h4 class="text-center">Creaza un <a href="articol_nou.php" class="btn btn-outline-warning text-dark text-decoration-underline"><i class="fa fa-newspaper"></i> articol nou</a> !</h4>
        </div>
    <?php
    } else {
?>
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-sm-12 bg-white mr-3">
            <div class="accordion" id="articles">
            <?php foreach($articole as $index => $articol): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="hitem<?=$articol['id']?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item<?=$articol['id']?>" aria-expanded="true" aria-controls="item<?=$articol['id']?>">
                            <?php
                            $notifications = $notify->hasNotification($articol['id'], $_SESSION['user_id']);

                            if($notifications)
                            {
                                echo "<span class=\"badge text-bg-danger\"> <i class=\"fa fa-bell\"></i>". count($notifications) ." </span>&nbsp;&nbsp;";
                            }
                            ?>
                            <?=$articol['title']?>
                            <?php
                            if($articol['status_id'] == 3){
                                echo "<span class=\"text-small text-danger\">&nbsp;(Draft)</span>";
                            }
                            ?>
                        </button>
                    </h2>
                    <div id="item<?=$articol['id']?>" class="accordion-collapse collapse <?php if($index == 0) { echo 'show';} ?>" aria-labelledby="hitem<?=$articol['id']?>">
                        <div class="accordion-body">
                            <p class="card-text">
                                <strong>Categorie: </strong><?=$arts->getCategoryById($articol['category_id'])?>
                                <strong>Creat: </strong><?=$articol['date_created']?>
                            </p>
                            <hr>
                            <p class="card-text"><?=substr($articol['content'], 0, 100).' ...'?></p>
                            <a href="articol.php?id=<?=$articol['id']?>" class="btn btn-outline-secondary">Vezi Articol</a>
                            <hr>
                            <a href="articol_editor.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark"><i class="fa fa-pen"></i> Editeaza</a>
                            <a href="publica_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark <?php if($articol['status_id'] == 1 || $articol['status_id'] == 4) { echo "disabled"; }?>" ><i class="fa fa-upload"></i> Cere Publicare</a>
                            <a href="sterge_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-danger ml-3 <?php if($articol['status_id'] != 3) { echo " disabled"; }?>" ><i class="fa fa-trash"></i> Sterge</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
    <?php }
} else { ?>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-12 bg-white mr-3">
                <div class="accordion" id="articles">
                    <?php foreach($articole as $index => $articol): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="hitem<?=$articol['id']?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item<?=$articol['id']?>" aria-expanded="true" aria-controls="item<?=$articol['id']?>">
                                    <?php
                                    $notifications = $notify->hasNotification($articol['id'], $_SESSION['user_id']);

                                    if($notifications)
                                    {
                                        echo "<span class=\"badge text-bg-danger\"> <i class=\"fa fa-bell\"></i>". count($notifications) ." </span>&nbsp;&nbsp;";
                                    }
                                    ?>
                                    <?=$articol['title']?>
                                    <?php
                                    if($articol['status_id'] == 3){
                                        echo "<span class=\"text-small text-danger\">&nbsp;(Draft)</span>";
                                    }
                                    ?>
                                </button>
                            </h2>
                            <div id="item<?=$articol['id']?>" class="accordion-collapse collapse <?php if($index == 0) { echo 'show';} ?>" aria-labelledby="hitem<?=$articol['id']?>">
                                <div class="accordion-body">
                                    <p class="card-text">
                                        <strong>Categorie: </strong><?=$arts->getCategoryById($articol['category_id'])?>
                                        <strong>Publicat: </strong><?=$articol['date_created']?>
                                    </p>
                                    <hr>
                                    <p class="card-text"><?=substr($articol['content'], 0, 100).' ...'?></p>
                                    <hr>
                                    <a href="articol.php?id=<?=$articol['id']?>" class="btn btn-outline-secondary">Vezi Articol</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php }
    ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'templates/footer.php'; ?>