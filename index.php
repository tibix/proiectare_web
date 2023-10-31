<?php
	require_once 'includes/config.php';
	require_once 'includes/database.php';
	require_once 'classes/Article.php';

	$loggedIn = $_SESSION['logged_in'];

	if($loggedIn == true) {
		header("Location: home.php");
	} else {
		header("Location: autentificare.php");
	}


	include 'templates/header.php';
	include 'templates/footer.php';
?>