<?php
session_start();
include 'templates/header.php';
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

if(isset($_SESSION)){
    print_r($_SESSION);
}

include 'templates/footer.php';
?>

