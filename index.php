<?php

session_start();

include 'templates/header.php';
require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require_once 'classes/User.php';

$db = new Database();
$user = new User($db);
$tech_articles = new Article($db);
$articles = $tech_articles->getAllArticles();

function compare($a, $b)
{
	return ($a['featured']< $b['featured']);
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
				</div>
			</div>
		</div>
	<?php }}; ?>
	</div>
</div>
<?php
include 'templates/footer.php';

?>