<?php
    echo "<script language=JavaScript> location='dash_board.php';</script>";
    include 'connect.php';
    $id = $_GET['id'];
    $sql="DELETE FROM `order_list` WHERE `id_order`=$id";
    $result=$conn->query($sql);
?>