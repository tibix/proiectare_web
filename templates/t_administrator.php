<?php

if(!$_SESSION['role'] == "administrator")
{
    redirect('index.php');
}

if(isset($_GET))
{
    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];

        if($action = 'manage_users')
        {
            /*
             * Get users
             */
            $db = new Database();
            $user = new User($db);

            $users = $user->getUsers([1,2,3]);

        }
    }
}

