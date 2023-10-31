<?php

function logged_in(){
    if(isset($_SESSION['loggedin'])){
        $loggedin=TRUE;
        return $loggedin;
    }
}