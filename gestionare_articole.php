<?php

session_start();

include 'templates/header.php';
require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';

if(!logged_in() && $_SESSION['user_role'] == 1){
    redirect("home.php");
}

$db = new Database();
$arts = new Article($db);
$articole = $arts->getAllArticles($_SESSION['user_id']);

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-sm-9 bg-white mr-3">
            <div class="accordion" id="example">
            <?php foreach($articole as $articol): ?>
                <div class="card bg-dark my-3">
                    <div class="card-header">
                        <a class="text-light fs-4" data-toggle="collapse" href="#item<?=$articol['id']?>">
                            <?=$articol['title']?>
                        </a>
                    </div>
                    <div id="item<?=$articol['id']?>" class="collapse" data-parent="#example">
                        <div class="card-body bg-light">
                            <p class="card-text">
                                <strong>Categorie: </strong><?=$arts->getCategoryById($articol['category_id'])?>
                                <strong>Publicat: </strong><?=$articol['date_created']?>
                            </p>
                            <hr>
                            <p class="card-text"><?=substr($articol['content'], 0, 100).' ...'?></p>
                            <a href="articol.php?id=<?=$articol['id']?>" class="btn btn-outline-secondary">Vezi Articol</a>
                            <hr>
                            <a href="articol.php?id=<?=$articol['id']?>" class="btn btn-outline-warning text-dark"><i class="fa fa-pen"></i> Editeaza</a>
                            <a href="#" class="btn btn-outline-warning text-dark"><i class="fa fa-upload"></i> Publica</a>
                            <a href="sterge_articol.php?id=<?=$articol['id']?>" class="btn btn-outline-danger ml-3"><i class="fa fa-trash"></i> Sterge</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="col-sm-3 bg-white mr-3">
            <h1>Data utile:</h1> 
            <div class="row mx-3">
                Some data
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css">
<script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'templates/footer.php'; ?>