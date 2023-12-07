<?php

session_start();
include 'core/utils.php';

require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';
require_once 'classes/Favorite.php';
require_once 'classes/Notification.php';

include 'templates/header.php';
$db = new Database();
$user = new User($db);
$tech_articles = new Article($db);
$fav = new Favorite($db);
$articles = $tech_articles->getAllArticles();

function compare($a, $b)
{
	return ($b['featured'] <=> $a['featured']);
}

usort($articles, "compare");
?>
<div class="container-fluid">
	<div class="row my-3">
	<?php foreach($articles as $fa){
		if($fa['featured'] == 1){ ?>
		<div class="col-sm-12">
			<div class="card my-2">
				<div class="card-header bg-warning">
					Featured
				</div>
				<div class="card-body">
					<h5 class="card-title"><?=$fa['title']?></h5>
					<p class="card-text"><?=substr($fa['content'], 0, 100).' ...';?></p>
					<a href="articol.php?id=<?=$fa['id']?>" class="btn btn-outline-warning">Citeste</a>
					<?php if(logged_in()):?>
						<?php if($fav->isFavorite($fa['id'], $_SESSION['user_id'])) { ?>
							<a class="btn btn-outline-danger" href="favorites.php?id=<?=$fa['id']?>&action=remove"><i class="fa-solid  fa-heart"></i></a>
						<?php } else { ?>
							<a class="btn btn-outline-secondary" href="favorites.php?id=<?=$fa['id']?>&action=add"><i class="fa-regular fa-heart"></i></a>
						<?php } ?>
					<?php endif; ?>
					</br></br>Categorie: <a href="articole.php?categorie=<?=$fa['category_id']?>" class="text-dark">[<?=ucfirst(idToCategory($fa['category_id']))?>]</a>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="col-lg-4 d-flex align-items-stretch">
			<div class="card my-2">
				<div class="card-body">
					<h5 class="card-title"><?=$fa['title']?></h5>
					<p class="card-text"><?=substr($fa['content'], 0, 100).' ...';?></p>
					<a href="articol.php?id=<?=$fa['id']?>" class="btn btn-outline-warning">Citeste</a>
					<?php if(logged_in()):?>
					<?php if($fav->isFavorite($fa['id'], $_SESSION['user_id'])) { ?>
						<a class="btn btn-outline-danger" href="favorites.php?id=<?=$fa['id']?>&action=remove"><i class="fa-solid  fa-heart"></i></a>
					<?php } else { ?>
						<a class="btn btn-outline-secondary" href="favorites.php?id=<?=$fa['id']?>&action=add"><i class="fa-regular fa-heart"></i></a>
					<?php } ?>
					<?php endif; ?>
					</br></br>Categorie: <a href="articole.php?categorie=<?=$fa['category_id']?>" class="text-dark">[<?=ucfirst(idToCategory($fa['category_id']))?>]</a>

				</div>
			</div>
		</div>
	<?php }}; ?>
	</div>
</div>
<?php
include 'templates/footer.php';

?>