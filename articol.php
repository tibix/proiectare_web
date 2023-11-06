<?php

session_start();

include 'templates/header.php';
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';

echo "<div class='container my-4'>";

if(!empty($_GET))
{
    $db = new Database();
    $user = new User($db);
    $articol = new Article($db);

    $id = $_GET['id'];

    $articol_selectat = $articol->getArticleById($id);
    
    if($articol_selectat){

        $autor = $user->getAuthorById($articol_selectat['user_id']);
        $cat = $articol->getCategoryById($articol_selectat['category_id']);
        foreach ($autor as $a) { $author = $a['f_name'] . " " . $a['l_name']; };

        if(logged_in())
        {
            ?>
                <div class="card mb-5">
					<div class="card-header">
						Autor: <b><?php echo "{$author}"; ?></b>
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php echo "{$articol_selectat['title']}"; ?></h5>
						<p class="card-text"><?php echo "{$articol_selectat['content']}";?></p>
					</div>
					<div class="card-footer">
						<small class="text-muted">Postat la data:  <?=$articol_selectat['date_created'];?> in Categoria: <?=$cat?></small>
					</div>
				</div>
            <?php
        } else {
            ?>
                <div class="card mb-5">
					<div class="card-header">
						Autor: <b><?php echo "{$author}"; ?></b>
					</div>
					<div class="card-body">
						<h4 class="card-title"><?php echo "{$articol_selectat['title']}"; ?></h4>
                        <h6 class="card-text">Pentru a citi articolul, va rugam sa va autentificati!</h6>
                        <a class="btn btn-outline-warning" href="autentificare.php">Autentificare</a>
					</div>
					<div class="card-footer">
						<small class="text-muted">Postat la data:  <?=$articol_selectat['date_created'];?> in Categoria: <?=$cat?></small>
					</div>
				</div>
            <?php
        }
        
    } else {
        echo "<h1 class='text-center'>Articolul nu exista</h1><h4 class='text-center'><a href='index.php' class='text-warning'>Inapoi la pagina principala</a></h4>";
    }
} else {
        echo "<h1 class='text-center'>Nici un articol selectat</h1>";
}

echo "</div>";

include 'templates/footer.php';