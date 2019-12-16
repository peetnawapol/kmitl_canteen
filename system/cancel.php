<?php
    echo "<script language=JavaScript> location='dash_board.php';</script>";
    include 'connect.php';
    $id = $_GET['id'];
    $sql="DELETE FROM `order_lists` WHERE `id_order`=$id";
    $result=$conn->query($sql);
?>