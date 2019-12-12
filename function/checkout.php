<?php require_once("connect.php");
      include("authentication.php");

    if(!isset($_SESSION['loggedin'])) {
        header('Location: ../account.php');
        exit();
    } else {
        if(isset($_POST)) {

                header('Location: ../account.php');
                exit();
        exit();
        } else {
            die(var_dump($HTTP_RAW_POST_DATA) + 'error'); 
        }
    }
?>