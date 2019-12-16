<?php
  ob_start();
  include "connect.php";
  $user = $_POST['user_log'];
  $pass = $_POST['pass_log'];

  if($user == '' or $pass == '')
  {

    echo "<script language=JavaScript> alert('กรุณากรอกข้อมูลให้ครบถ้วน'); location='login.html';</script>";

  }
  else
  {
    $find = "SELECT * FROM `customer_member` WHERE name='$user' and pass='$pass'";
    $result = $conn->query($find);

    if($result->num_rows<=0)
    {
      echo "<script language=JavaScript> alert('รหัสผ่านหรือขื่อผู้ใช้ผิด'); location='login.html';</script>";

    }
    else
    {
      while($row = $result->fetch_assoc())
      {
        session_start();
        $_SESSION['id'] =  $row['id_cm'] ;
        $_SESSION['store'] =  $row['store_name'];
        echo "<script language=JavaScript> alert('รหัสผ่านหรือขื่อผู้ใช้ผิด'); location='dash_board.php';</script>";

      }
    }
  }

 ?>
