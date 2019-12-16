<?php session_start();
    if ($_SESSION['id'] == ''){
        echo "<script> window.location.href='login.html';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Shop</title>
    <?php include "md_head.php"; ?>
</head>

<body>
    <?php include "navbar.php"; ?>
    <br>
    <div id="order">
        <?php
        include "order.php";
        ?>
    </div>
    <?php include "script.php"; ?>
</body>

</html>
</body>

</html>