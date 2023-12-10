<?php

function logged_in(){
    if(isset($_SESSION['loggedin'])){
        return true;
    }

    return false;
}

function redirect($url)
{
    if (!headers_sent())
    {
        header('Location: '.$url);
        exit;
        }
    else
        {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function generateToken()
{
    $token = bin2hex(random_bytes(64));
    return $token;
}

function idToCategory($id)
{
    switch($id){
        case 1:
            return "arta";
            break;
        case 2:
            return "tehnica";
            break;
        case 3:
            return "stiinta";
            break;
        case 4:
            return "moda";
            break;
    }
    return null;
}

function prety_dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * @param array $errors
 * @return void
 */
function show_errors(array $errors): void
{
    foreach ($errors as $error) {
        echo "<div class=\"alert alert-danger alert-dismissible text-secondary fade show text-center mb-1\" role=\"alert\">$error";
        echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
    }
}

function show_success($message): void
{
    echo "<div class=\"alert alert-success alert-dismissible text-secondary fade show text-center mb-1\" role=\"alert\">$message";
    echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
}

function some_time_ago($date)
{
    $time1 = new DateTime($date);
    $now = new DateTime();
    $interval = $time1->diff($now,true);

    if ($interval->y) {
        if($interval->y == 1){
            echo 'un an';
        } else {
            echo $interval->y . ' ani';
        }
    } elseif ($interval->m){
        if($interval->m == 1){
            echo 'o luna';
        } else {
            echo $interval->m . ' luni';
        }
    } elseif ($interval->d) {
        if($interval->d == 1) {
            echo 'o zi';
        } else {
            echo $interval->d . ' zile';
        }
    } elseif ($interval->h) {
        if($interval->h == 1){
            echo 'o ora';
        } else {
            echo $interval->h . ' ore';
        }
    } elseif ($interval->i) {
        if($interval->i == 1){
            echo 'un minut';
        } else {
            echo $interval->i . ' minute';
        }
    } else {
        echo "mai putin de un minut";
    }
}

function generateRandomColor() {
    $red = mt_rand(0, 255);
    $green = mt_rand(0, 255);
    $blue = mt_rand(0, 255);

    return "'rgb($red, $green, $blue)'";
}

function idToRol($id)
{
    switch($id){
        case 1:
            return "Utilizator";
            break;
        case 2:
            return "Jurnalist";
            break;
        case 3:
            return "Editor";
            break;
        case 4:
            return "Administrator";
            break;
    }
    return null;
}