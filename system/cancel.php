<?php
    
    include 'connect.php';
    $id = $_GET['id'];
    $sql="DELETE FROM `order_lists` WHERE `id_order`=$id";
    $result=$conn->query($sql);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit;
?>