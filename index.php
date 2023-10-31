<?php
	session_start();

	include 'templates/header.php';
	require_once 'includes/config.php';
	require_once 'includes/database.php';
	require_once 'classes/Article.php';
	
	if(logged_in()){
		print_r($_SESSION);
	} else {
		header("Location: autentificare.php");
	} 
	
	include 'templates/footer.php';

?>