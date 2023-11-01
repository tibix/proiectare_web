<?php
session_start();
include 'templates/header.php';
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

if(logged_in()){
?>

<div class="mx-5 my-5">
    <h1>Bun venit in contul tau <?php echo($_SESSION['f_name']. '  ' .$_SESSION['l_name']); ?></h1>
</div>

<?php
} else {
    redirect("autentificare.php");
}
include 'templates/footer.php';
?>

