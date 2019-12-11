<?php 
    session_start();
    
    unset($_SESSION['items']);
    unset($_SESSION['strQty']);
    unset($_SESSION['canteen']);
    unset($_SESSION['resta']);
    unset($_SESSION['strID']);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>