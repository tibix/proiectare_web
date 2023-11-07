<?php

session_start();

include 'templates/header.php';
require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';

if(!logged_in()){
	redirect("autentificare.php");
}
?> <div class="container-fluid"> <?php

if(isset($_GET['id'])){
	$db = new Database();
	$arts = new Article($db);
	$categories = $arts->getCategories();
	$article = $arts->getArticleById($_GET['id']);
	if($article['user_id'] != $_SESSION['user_id']){
?>
	<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Hmmm!</strong> Nu ai drepul sa editezi acest articol!</br></br>
		<a class="btn btn-outline-warning" href="home.php">Inapoi</a>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php }} else { ?>
	<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Hmmm!</strong> Nu a fost selectat nici un articol!</br></br>
		<a class="btn btn-outline-warning" href="home.php">Inapoi</a>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php }
	if(isset($_POST['salveaza']))
	{
		$arts->updateArticle($_GET['id'], $_POST['titlu'], nl2br($_POST['continut']), $_POST['category']);
		if($arts){
			redirect("home.php");
		} else {
			echo "Eroare la salvarea articolului!";
		}
	}
	else {
?>
	<div class="mx-2 my-3">
		<form name="editare_articol" method="POST">
			<div class="row mb-3">
				<label for="title" class="col-sm-2 col-form-label">Titlu</label>
				<div class="col-sm-10">
				<input type="text" name="titlu" class="form-control" id="title" value="<?=$article['title']?>">
				</div>
			</div>
			<div class="row mb-5">
				<label for="content" class="col-sm-2 col-form-label">Continut</label>
				<div class="col-sm-10">
					<textarea name="continut" class="form-control editor" id="continut">
						<?=$article['content']?>
					</textarea>
				</div>
			</div>
			<div class="row mb-3">
				<label for="category" class="col-sm-2 col-form-label">Categorie</label>
				<div class="col-sm-10">
					<select class="form-select" id="category" name="category" aria-label="Default select example">
						<?php foreach($categories as $category){ 
							$selected = ($article['category_id'] == $category['id'] ?  " selected='selected' " : "");
							?>
							<option <?=$selected?> value="<?=$category['id']?>"><?=$category['category_name']?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<button type="submit" name="salveaza" class="btn btn-outline-warning">Salveaza</button>
		</form>
	</div>
<?php } ?>
</div>
<script src="https://cdn.tiny.cloud/1/i3n24dewaedcnkj5ncgicuzwd8wi7lmbgdtsikehoxiix5dt/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons  visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
<?php
include 'templates/footer.php';