<?php

require_once 'core/config.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['inregistrare'])){
    // validam forma
    $errors = array();
    $db = new Database();
    if(!empty($_POST['u_name'])) {
        $u_name = $_POST['u_name'];
        $check_u_name = "SELECT u_name FROM users WHERE u_name = '$u_name'";
        $result_u_name = $db->query($check_u_name);

        if($result_u_name->num_rows > 0){
            $errors[] = "Numele de utilizator este deja folosit!";
        }

    } else {
        $errors[] = "Nume utilizator invalid!";
    }
    if(!empty($_POST['f_name'])) { $f_name = $_POST['f_name']; } else { $errors[] = "Nume invalid!"; }
    if(!empty($_POST['l_name'])) { $l_name = $_POST['l_name']; } else { $errors[] = "Prenume invalid!"; }
    if(!empty($_POST['u_email'])) { 
        $email = $_POST['u_email'];
        $check_email = "SELECT email FROM users WHERE email = '$email'";
        $result_email = $db->query($check_email);

        if($result_email->num_rows > 0){
            $errors[] = "Email-ul este deja folosit!";
        }
    } else { 
        $errors[] = "Email invalid!"; 
    }
    if(!empty($_POST['u_password'])) { $password = $_POST['u_password']; } else { $errors[] = "Parola invalida!"; }
    if(!empty($_POST['u_password_c'])) { $password2 = $_POST['u_password_c']; } else { $errors[] = "Confirmare parola invalida!"; }
    if($_POST['u_password'] !== $_POST['u_password_c']) { $errors[] = "Parolele nu coincid!"; }

    if(empty($errors)){
        // convert password to MD5 encripted string
        $now = date('Y-m-d H:i:s');

        $user = new User($db);

        if($user->createUser($u_name, $f_name, $l_name, $email, $password, $now)) {
            $db->close();
            redirect("autentificare.php");
        } else {
            $error[] = "Eroare la crearea contului! Va rugam incercati mai tarziu!";
        }
    } else {
        show_errors($errors);
    }
}

include 'templates/t_register.php';
include 'templates/footer.php';
