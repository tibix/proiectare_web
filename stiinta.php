<?php
session_start();

include 'templates/header.php';
require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';
require_once 'classes/Favorite.php';

$db = new Database();
$user = new User($db);
$arts = new Article($db);
$fav = new Favorite($db);

$articles = $arts->getArticlesByCategory(3);

if(logged_in()){
	//show article contents
	?> <div class="container"><div class="mx-5 my-5"><div class="card-deck"> <?php
	foreach ($articles as $article){
		$autor = $user->getAuthorById($article['user_id']);
		$category = (int)$article['category_id'];
		$cat = $arts->getCategoryById($category);
		foreach ($autor as $a) { $author = $a['f_name'] . " " . $a['l_name']; };
		?>
			<div class="card mb-5">
				<div class="card-header">
					Autor: <b><?php echo "{$author}"; ?></b>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?php echo "{$article['title']}"; ?></h5>
					<p class="card-text"><?php echo "{$article['content']}";?></p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Postat la data:  <?=$article['date_created'];?> in Categoria: <?=$cat?></small>
                    <span class="float-end">
                    <?php if($fav->isFavorite($article['id'], $_SESSION['user_id'])) { ?>
                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$article['id']?>&action=remove"><i class="fa-solid  fa-thumbs-up"></i></a>
                    <?php } else { ?>
                        <a class="btn btn-outline-secondary" href="favorites.php?id=<?=$article['id']?>&action=add"><i class="fa-regular fa-thumbs-up"></i></a>
                    <?php } ?>
                    </span>
				</div>
			</div>
		<?php
	}
	?> </div> </div> </div> <?php
} else {
	?> <div class="container"><div class="mx-5 my-5"><div class="card-deck"> <?php
	foreach ($articles as $article){
		$autor = $user->getAuthorById($article['user_id']);
		$category = (int)$article['category_id'];
		$cat = $arts->getCategoryById($category);
		foreach ($autor as $a) { $author = $a['f_name'] . " " . $a['l_name']; };
		?>
			<div class="card mb-5">
				<div class="card-header">
					Autor: <b><?php echo "{$author}"; ?></b>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?php echo "{$article['title']}"; ?></h5>
					<a class="btn btn-outline-warning" href="autentificare.php">Citeste articolul</a>
                    <?php if($fav->isFavorite($article['id'], $_SESSION['user_id'])) { ?>
                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$article['id']?>&action=remove"><i class="fa-solid fa-heart"></i></a>
                    <?php } else { ?>
                        <a class="btn btn-outline-secondary" href="favorites.php?id=<?=$article['id']?>&action=add"><i class="fa-regular fa-heart"></i></a>
                    <?php } ?>
				</div>
				<div class="card-footer">
					<small class="text-muted">Postat la data: <?=$article['date_created'];?> in Categoria: <?=$cat?></small>
				</div>
			</div>
		<?php
	}
	?> </div> </div> </div> <?php
}

include 'templates/footer.php';

?>