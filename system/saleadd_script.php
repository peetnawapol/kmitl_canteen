<?php
echo "<script language=JavaScript> location='sale_add.php';</script>";
include 'connect.php';
$f_name = $_POST['user'];
$pass = $_POST['password'];
$shop = $_POST['shop_name'];

if ($f_name == '' or $pass == '' or $shop == '')
  {
    echo $pass;
  }
  else
  {
    $find = "SELECT * FROM `customer_member` WHERE name='$f_name'";
    $result = $conn->query($find);
    if($result->num_rows>0)
    {
      echo "<script language=JavaScript> alert('มีชื่อผู้ใช้ในระบบเเล้ว'); </script>";
    }
    else{
      $regis = "INSERT INTO `customer_member`(`store_name`, `name`, `pass`) VALUES ('$shop','$f_name','$pass')";
      $result = $conn->query($regis);
      if ($result){
        echo "<script language=JavaScript> alert('สมัคสมาชิคสำเร็จ'); </script>";
      }
    else{
      echo "<script language=JavaScript> alert('สมัคสมาชิคไม่สำเร็จ'); </script>";
    }
    }
  }
 ?>
