<?php
    echo "<script language=JavaScript> location='dash_board.php';</script>";
    include 'connect.php';
    $id = $_GET['id'];
    $sql= "UPDATE order_lists SET status='FINISH' WHERE id_order=$id";
    $result=$conn->query($sql);
?>