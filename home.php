<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

include 'templates/header.php';
?>

<?php
    $loggedIn = $_SESSION['logged_in'];

    if($loggedIn == true) {
        echo "Now it's working!";
    } else {
        header("Location: autentificare.php");
    }
?>

<?php include 'templates/footer.php'; ?>

