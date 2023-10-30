<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'classes/Article.php';

include 'templates/header.php';
?>


<?php

// Verificați aici condițiile, dacă utilizatorii trebuie să fie redirecționați către home.php.
// Dacă trebuie să fie redirecționați, folosiți header("Location: home.php") pentru a-i redirecționa.
$loggedIn = False;

if($loggedIn == True) {
    header("Location: home.php");
} else {
    header("Location: autentificare.php");
}

include 'templates/footer.php';

?>