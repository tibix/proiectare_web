<?php

$articles = $arts->getAllArticles();

$my_articles = [];
$drafts = [];
$other_articles = [];

foreach($articles as $article)
{
	if($article['user_id'] == $_SESSION['user_id'])
	{
		if($article['status_id'] != 3) {
			$my_articles[] = $article;
		} else{
			$drafts[] = $article;
		}
	} else {
		$other_articles[] = $article;
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
			<h1 class="text-center">Articole Publicate</h1>
			<div class="row mx-3">
				<?php foreach($my_articles as $fa){
					if($fa['featured'] == 1){
				?>
				<div class="col-sm-12">
					<div class="card my-2">
						<div class="card-header bg-warning">
							Featured
						</div>
						<div class="card-body">
							<h5 class="card-title"><?=$fa['title']?></h5>
							<p class="card-text"><?=substr($fa['content'], 0, 100).' ...';?></p>
							<a href="articol.php?id=<?=$fa['id']?>" class="btn btn-outline-warning">Citeste</a>
							<a href="articol_editor.php?id=<?=$fa['id']?>" class="btn btn-outline-secondary">Editeaza</a>
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
							<a href="articol_editor.php?id=<?=$fa['id']?>" class="btn btn-outline-secondary">Editeaza</a>
						</div>
					</div>
				</div>
				<?php } } if(!empty($drafts)) { ?>
				<hr><h1 class="text-center">Articole in Lucru</h1>
				<div class="row">
				<?php foreach($drafts as $dr){?>
					<div class="col-lg-4 d-flex align-items-stretch">
						<div class="card my-2">
							<div class="card-header text-white bg-danger">
								Draft
							</div>
							<div class="card-body">
								<h5 class="card-title"><?=$dr['title']?></h5>
								<p class="card-text"><?=substr($dr['content'], 0, 100);?></p>
								<a href="articol.php?id=<?=$dr['id']?>" class="btn btn-outline-warning">Citeste</a>
								<a href="articol_editor.php?id=<?=$dr['id']?>" class="btn btn-outline-secondary">Continua editarea</a>
							</div>
						</div>
					</div>
				<?php } }?>
				</div>
			</div>
		</div>


		<div class="col-sm-4 ml-3">
			<h1 class="text-center">Alte articole</h1>
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
					</div>
				</div>
			</div>
			<?php } }?>
			</div>
		</div>
	</div>
</div>