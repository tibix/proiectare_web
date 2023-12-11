<?php

session_start();

require_once 'core/utils.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';

if(!logged_in()) {
    redirect('index.php');
}

if($_SESSION['role'] != 'administrator')
{
    redirect('index.php');
}

if(!isset($_GET['id'])) {
    redirect('index.php');
}

$db = new Database();
$user = new User($db);
$to_delete = $user->getUserById($_GET['id']);

if($to_delete['id'] == $_SESSION['user_id'])
{
    show_errors(['Nu poti sterge propriul cont!', 'Revino la <a href="home.php" class="text-dark text-decoration-underline">pagina principala!</a>']);
} else {
    $delete_user = $user->deleteUser($to_delete['id']);
    if($delete_user)
    {
        show_success('Utilizatorul a fost sters cu success! Click <a href="home.php" class="text-dark text-decoration-underline">aici</a> pentru a reveni la pagina principala</a>.');
    } else {
        show_errors(['A aparut erori la stergerea utilizatorului: ' . $delete_user, 'Click <a href="home.php" class="text-dark text-decoration-underline">aici</a> pentru a reveni la pagina principala</a>.']);
    }
}

