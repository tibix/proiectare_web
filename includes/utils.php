<?php

function logged_in(){
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True){
        return True;
    } else {
        return False;
    }
}