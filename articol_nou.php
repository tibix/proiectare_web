<?php

session_start();

include 'templates/header.php';
require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/Article.php';

if(!logged_in() && $_SESSION['user_role'] == 1){
	redirect("home.php");
}

$db = new Database();
$articol = new Article($db);
$categories = $articol->getCategories();
?> 
<div class="container-fluid"> 

<?php
	if(isset($_POST['salveaza']))
	{
		//valideaza si salveaza articolul apoi redirecteaza catre home.php
        $articol->createArticle($_POST['titlu'], nl2br($_POST['continut']), $_SESSION['user_id'], $_POST['category']);

        if($articol){
            redirect("home.php");
        } else {
            echo "Eroare la salvarea articolului!";
        }
	}
	else {
?>
	<div class="mx-2 my-3">
		<form name="articol_nou" method="POST">
			<div class="row mb-3">
				<label for="title" class="col-sm-2 col-form-label">Titlu</label>
				<div class="col-sm-10">
				<input type="text" name="titlu" class="form-control" id="title">
				</div>
			</div>
			<div class="row mb-5">
				<label for="content" class="col-sm-2 col-form-label">Continut</label>
				<div class="col-sm-10">
					<textarea name="continut" class="form-control editor" id="continut">
					</textarea>
				</div>
			</div>
			<div class="row mb-3">
				<label for="category" class="col-sm-2 col-form-label">Categorie</label>
				<div class="col-sm-10">
					<select class="form-select" id="category" name="category" aria-label="Default select example">
						<?php foreach($categories as $category){ ?>
							<option  value="<?=$category['id']?>"><?=$category['category_name']?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<button type="submit" name="salveaza" class="btn btn-outline-warning">Creaza articol nou</button>
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