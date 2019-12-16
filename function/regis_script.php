<?php
include 'connect.php';
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$id_std =$_POST['id_std'];
$faculty = $_POST['faculty'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$pass = $_POST['pass'];
$re_pass = $_POST['re_pass'];
$tel = $_POST['tel'];

if ($f_name == '' or $l_name == '' or $id_std == '' or $faculty == '' or $email == '' or $gender == '' or $pass == '' or $re_pass == '' or $tel == '')
  {
    echo "<script language=JavaScript> alert('กรุณากรอกข้อมูลให้ครบถ้วน'); </script>";
  }
if ($re_pass <> $pass)
  {
    echo "<script language=JavaScript> alert('รหัสผ่านไม่ตรงกัน'); </script>";
  }
else
  {
    $find = "SELECT * FROM `member` WHERE name='$f_name'";
    $result = $conn->query($find);
    if($result->num_rows>0)
    {
      echo "<script language=JavaScript> alert('มีชื่อผู้ใช้ในระบบเเล้ว'); </script>";
    }
    else{
      $regis = "INSERT INTO `member`(`name`, `pass`, `id_std`, `faculty`, `email`, `gender`, `tel`, `lastname`) VALUES ('$f_name','$pass','$id_std','$faculty','$email','$gender','$tel','$l_name')";
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
