<?php

session_start();

function checklogin_core(){
    if(!isset($_SESSION['user_id'])){
        header("Location: ../views/SignIn.php");
        exit();
    }
}


function getuserid_core(){

}


function isSuperAdmin_core(){
   return isset($_SESSION["role"]) && $_SESSION["role"] == 1;
}
?>