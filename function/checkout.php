<?php require_once("connect.php");
      include("authentication.php");

    if(!isset($_SESSION['loggedin'])) {
        header('Location: ../account.php');
        exit();
    } else {
        
    }
?>