<?php

session_start();

include 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/Notification.php';

include 'templates/header.php';

if (!logged_in()) {
    redirect('autentificare.php');
}

$db = new Database();
$user = new User($db);

if (isset($_POST['actualizare'])) {
    $errors = array();

    //check if post data is not empty
    if (empty($_POST['user_name'])) {
        $errors[] = "Campul \"Nume utilizator\" nu poate fii gol!";
    }

    if (empty($_POST['first_name'])) {
        $errors[] = "Campul \"Nume\" nu poate fii gol!";
    }

    if (empty($_POST['last_name'])) {
        $errors[] = "Campul \"Pre-nume\" nu poate fii gol!";
    }

    if (empty($_POST['email'])) {
        $errors[] = "Campul \"Email\" nu poate fii gol!";
    }


    if (
        $_POST['user_name'] == $_SESSION['user'] &&
        $_POST['first_name'] == $_SESSION['f_name'] &&
        $_POST['last_name'] == $_SESSION['l_name'] &&
        $_POST['email'] == $_SESSION['email']
    ) {
        $errors[] = "Nu ati facut nici o modificare!";
    }

    if (!$errors) {
        $update_user = $user->updateUser($_SESSION['user_id'], $_POST['user_name'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
        if (!$update_user) {
            show_errors(["There was an error updating user's data: " . $update_user]);
        } else {
            $_SESSION['user'] = $_POST['user_name'];
            $_SESSION['f_name'] = $_POST['first_name'];
            $_SESSION['l_name'] = $_POST['last_name'];
            $_SESSION['email'] = $_POST['email'];
            show_success(" Profilul a fost actualizat cu success. Mergi <a href='home.php' class='text-dark'>acasa</a>.");
        }
    } else {
        show_errors($errors);
    }
}

include 'templates/t_profil.php';

include 'templates/footer.php';
