<?php

session_start();

include 'core/utils.php';
require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';

include 'templates/header.php';
if(!logged_in() || $_SESSION['role'] == 4){
    redirect("autentificare.php");
}

$db = new Database();
$user = new User($db);

$utilizatori = $user->getUsers([1,2,3]);
?>
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-sm-12 bg-white mr-3">
            <div class="accordion" id="articles">
            <?php foreach($utilizatori as $index => $u): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="hitem<?=$u['id']?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item<?=$u['id']?>" aria-expanded="true" aria-controls="item<?=$u['id']?>">
                            <?=$u['u_name']?>
                        </button>
                    </h2>
                    <div id="item<?=$u['id']?>" class="accordion-collapse collapse <?php if($index == 0) { echo 'show';} ?>" aria-labelledby="hitem<?=$u['id']?>">
                        <div class="accordion-body">
                            <p class="card-text">
                                Rol: <strong><?=idToRol($u['role_id'])?></strong>
                            </p>
                            <p class="card-text">
                                Creat: <strong><?=$u['date_created']?></strong> (acum: <?=some_time_ago($u['date_created'])?>)
                            </p>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'templates/footer.php'; ?>