<?php

session_start();

include 'core/utils.php';

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

/**
 * Displays an invalid message for password recovery.
 *
 * This function echoes an alert message indicating that the password recovery link is invalid.
 * It provides instructions for the user to check their email for the correct link or generate a new one.
 *
 * @return void
 */
function invalid_message()
{
    echo '<div class="alert alert-danger alert-dismissible fade show text-secondary" role="alert">';
    echo 'Link invalid!';
    echo 'Verifica link-ul primit si asigur-te ca e copiat corect, sa incearca sa re-generezi un <a href="resetare_parola.php" class="text-dark fw-bold">link de recuperarea</a>!';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    echo '</div>';
}

if(logged_in())
{
    redirect('resetare_parola.php');
    die();
}

if(isset($_GET['user_id']) && isset($_GET['token']))
{
    if(!empty($_GET['user_id']) && !empty($_GET['token'])){

        // check if user_id and token are valid
        $db = new Database();
        $user = new User($db);
        $user_id = $_GET['user_id'];
        $token = $_GET['token'];
        $user_data = $user->getUserById($user_id);

        if(!$user_data){
            invalid_message();
            die();
        }

        if(!$user->hasToken($user_id, $token)){
            invalid_message();
            die();
        }

        if(isset($_POST['recover_password']))
        {
            if(isset($_POST['new_password']) && isset($_POST['new_password_c']))
            {
                $errors = array();

                if(empty($_POST['new_password'])){
                    $errors[] = 'Introdu noua parola!';
                }

                if(empty($_POST['new_password_c'])){
                    $errors[] = 'Confirma noua parola!';
                }

                if($_POST['new_password'] != $_POST['new_password_c']){
                    $errors[] = 'Cele doua parole sunt diferite!';
                }

                if(!empty($errors))
                {
                    show_errors($errors);
                } else {
                    $user->updateUserPassword($user_id, $_POST['new_password']);
                    $user->deleteToken($user_id);
                    show_success("Parola a fost modificata cu success! Click <a href='autentificare.php'>aici</a> pentru a merge la autentificare!");
                    die();
                }
            }
        }
        include 'templates/t_password_recover.php';
    } else {
        invalid_message();
        die();
    }
} else {
    redirect('resetare_parola.php');
}

include 'templates/footer.php';