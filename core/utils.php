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

function dates_difference($date)
{
    $date1 = new DateTime($date);
    $date2 = new DateTime("now");
    $interval = $date1->diff($date2);

    echo $interval->d." zile, ".$interval->h." ore, ".$interval->i ." minute, si " . $interval->s ." secunde";
}