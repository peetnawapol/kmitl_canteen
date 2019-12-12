<?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $database = "project";

    $conn = new mysqli($servername, $username, $password,$database);

    mysqli_set_charset($conn,'utf8');

    ob_start();
    session_start();
    header("Content-Type:text/html; charset=utf8;");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
