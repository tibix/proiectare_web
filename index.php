<?php
	session_start();

	include 'templates/header.php';
	require_once 'includes/config.php';
	require_once 'includes/database.php';
	require_once 'classes/Article.php';

	if(logged_in()){
		print_r($_SESSION);
	} else {
		?>
			<div class="mx-5 my-5">
				<h1 class="text-center">Bun venit pe platforma noastra!</h1>
				<p>Pentru a avea acces la intregul continut, te rugam sa iti creezi un cont</p>
				<a href="inregistrare.php" class="btn btn-secondary">Inregistrare</a></br></br></br>
				<p>Daca detii deja un cont, foloseste butonul de autentificare pentru a te loga</p>
				<a href="autentificare.php" class="btn btn-secondary">Autentificare</a>
			</div>
		<?php
	}

	include 'templates/footer.php';

?>