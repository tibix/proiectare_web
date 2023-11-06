<?php

function logged_in(){
    if(isset($_SESSION['loggedin'])){
        $loggedin=TRUE;
        return $loggedin;
    }
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