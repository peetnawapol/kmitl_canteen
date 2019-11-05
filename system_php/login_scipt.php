<?php
  include "connect.php"
  $user = $_POST['user_log'];
  $pass = $_POST['pass_log'];

  if($user == '' or $pass == '')
  {

    echo "<script language=JavaScript> alert('กรุณากรอกข้อมูลให้ครบถ้วน'); location='../login.php'; </script>";

  }
  else
  {

    $find = "SELECT * FROM member WHERE student_id='$user'";
    $result = $conn->query($find);

    if($result->num_rows<=0)
    {

      echo "<script language=JavaScript> alert('ไม่พบรหัสในระบบ'); location='../login.php'; </script>";

    }
    else
    {

      $log = "SELECT * FROM member WHERE student_id='$user' AND password='$pass'";
      $result2 = $conn->query($log);

      if($result2->num_rows<=0)
      {

        echo "<script language=JavaScript> alert('รหัสนักเรียน / รหัสผ่าน ไม่ถูกต้อง'); location='../login.php'; </script>";

      }
      else
      {

        session_start();
        while($row = $result2->fetch_assoc())
        {


          $_SESSION['sess_id'] =  $row['student_id'] ;
          $_SESSION['id'] =  $row['id'] ;
          $_SESSION['sess_name'] =  $row['name'];
          $_SESSION['sess_surname'] =  $row['surname'];
          $_SESSION['sess_type'] =  $row['status'];
          echo "<script language=JavaScript> alert('เข้าสู่ระบบสำเร็จ'); location='../index.php'; </script>";

        }

      }

    }

  }

 ?>
