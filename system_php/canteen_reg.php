<?php
  include "ip_card_cks.php";
  include "pw_gen.php";
$id = $_POST['student_id_reg'];
$ip_card = $_POST['student_ip_reg'];
if ($id == "" or $ip_card == "")
{
  echo "<script language=JavaScript> alert('กรุณาใส่ข้อมูลให้ครบ'); location='../register.php'; </script>";
}
if (ip_card_chk($ip_card)){
  echo "<script language=JavaScript> alert('หมายเลขบัตรประชนไม่ถูกต้อง'); location='../register.php'; </script>";
}
else{
  $sql = "SELECT * FROM member WHERE student_id='$id'";
  $result = $conn->query($sql);
  if($result->num_rows<=0){
    $data = "INSERT INTO `member`(`id`, `student_id`, `password`, `birth`, `prefix`, `name`, `surname`, `status`) VALUES ('','$id','randomPassword()','ยังไม่ได้เพิ่มข้อมูล','ยังไม่ได้เพิ่มข้อมูล','ยังไม่ได้เพิ่มข้อมูล','ยังไม่ได้เพิ่มข้อมูล')"
    $result = $conn->query($data);
    if($result)
    {
      echo "<script language=JavaScript> alert('สมัคสมาชิกได้สำเร็จ'); location='../index.php'; </script>";}
    else {
      echo "<script language=JavaScript> alert(ล้มเหลว); location='../index.php'; </script>";
    }
    }
  else{
    echo "<script language=JavaScript> alert(มีรหัสนักเรียนในระบบแล้ว); location='../index.php'; </script>";
  }
  }

 ?>
