<?php
  include "connect.php";
  $user = $_POST['user_log'];
  $pass = $_POST['pass_log'];

  if($user == '' or $pass == '')
  {

    echo "<script language=JavaScript> alert('กรุณากรอกข้อมูลให้ครบถ้วน'); </script>";

  }
  else
  {
    $find = "SELECT * FROM `member` WHERE name='$user' and pass='$pass'";
    $result = $conn->query($find);

    if($result->num_rows<=0)
    {
      echo "<script language=JavaScript> alert('รหัสผ่านหรือขื่อผู้ใช้ผิด'); </script>";

    }
    else
    {
      while($row = $result->fetch_assoc())
      {
        $_SESSION['id'] =  $row['id_member'] ;
        $_SESSION['sess_name'] =  $row['name'];
        echo "<script language=JavaScript> alert('เข้าสู่ระบบสำเร็จ'); </script>";

      }
    }
  }

 ?>
