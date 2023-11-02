<?php
	session_start();

	include 'templates/header.php';
	require_once 'includes/config.php';
	require_once 'includes/database.php';
	require_once 'classes/Article.php';
	require_once 'classes/User.php';
	$db = new Database();
	$user = new User($db);
	$tech_articles = new Article($db);
	$tech_selection = $tech_articles->getArticlesByCategory('2');

	if(logged_in()){
		//show article contents
		?> <div class="container"><div class="mx-5 my-5"><div class="card-deck"> <?php
		foreach ($tech_selection as $article){
			$autor = $user->getAuthorById($article['user_id']);
			foreach ($autor as $autor) { $author = $autor['f_name'] . " " . $autor['l_name']; };
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
						<small class="text-muted">Postat in: <?php echo "{$article['date_created']}"; ?></small>
					</div>
				</div>
			<?php
		}
		?> </div> </div> </div> <?php
	} else {

		?> <div class="container"><div class="mx-5 my-5"><div class="card-deck"> <?php
		foreach ($tech_selection as $article){
			$autor = $user->getAuthorById($article['user_id']);
			foreach ($autor as $autor) { $author = $autor['f_name'] . " " . $autor['l_name']; };
			?>
				<div class="card mb-5">
					<div class="card-header">
						Autor: <b><?php echo "{$author}"; ?></b>
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php echo "{$article['title']}"; ?></h5>
						<a class="btn btn-outline-warning" href="autentificare.php">Citeste articolul</a>
					</div>
					<div class="card-footer">
						<small class="text-muted">Postat in: <?php echo "{$article['date_created']}"; ?></small>
					</div>
				</div>
			<?php
		}
		?> </div> </div> </div> <?php
	}

	include 'templates/footer.php';

?>