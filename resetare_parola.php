<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/Notification.php';

include 'core/utils.php';
include 'templates/header.php';

if(logged_in()){
    if(isset($_POST['reset_password']))
    {
        $errors = array();

        if(empty($_POST['current_password'])){
            $errors[] = 'Introdu parola curenta!';
        }

        if(empty($_POST['new_password'])){
            $errors[] = 'Introdu noua parola!';
        }

        if(empty($_POST['new_password_c'])){
            $errors[] = 'Confirma noua parola!';
        }

        if($_POST['new_password'] != $_POST['new_password_c']){
            $errors[] = 'Noua parola nu e confirmata corect!';
        }

        $db = new Database();
        $user = new User($db);

        $current_user = $user->getUserById($_SESSION['user_id']);
        if($current_user['password'] != md5($_POST['current_password'])){
            $errors[] = 'Parola curenta este incorecta!';
        }

        if($_POST['current_password'] == $_POST['new_password']){
            $errors[] = 'Vechea si noua parola trebuie sa fie diferite!';
        }

        if(!empty($errors))
        {
            show_errors($errors);
        } else {
            $user->updateUserPassword($_SESSION['user_id'], $_POST['new_password']);
            show_success("Parola a fost resetata cu succes! Click <a href='autentificare.php'>aici</a> pentru autentificare.");
            die();
        }
    }
    include 'templates/t_password_reset.php';
} else {
    if(isset($_POST['recover_password']))
    {
        $errors = array();

        if(!isset($_POST['email']) || empty($_POST['email'])){
            $errors[] = 'Campul Email nu poate fii gol!';
        } else {
            $db = new Database();
            $user = new User($db);
            $user_data = $user->getUserByLogin($_POST['email']);
            if(empty($user_data)){
                $errors[] = 'Aceasta adresa de e-mail nu a fost gasita!';
            }
        }

        if(!empty($errors))
        {
            show_errors($errors);
        } else {
            $user->setToken($user_data['id']);
            $uri = $_SERVER['REQUEST_URI'];
            $uri = explode('/', $uri);

            $reset_link = "http://" . $_SERVER['HTTP_HOST'];
            foreach($uri as $element){
                if($element != end($uri))
                    $reset_link = $element . "/";
            }

            $reset_link = "recuperare_cont.php?user_id=" . $user_data['id'] . "&token=" . $user->getToken($user_data['id']);
            sleep(2);
            redirect($reset_link);
        }
    }
    include 'templates/t_password_reset_email.php';
}

include 'templates/footer.php';