<?php
 include "connect.php"
  session_start();
  unset($_SESSION['sess_id']);
  unset($_SESSION['id']);
  unset($_SESSION['sess_name']);
  unset($_SESSION['sess_surname']);
  unset($_SESSION['sess_type']);
  session_destroy();
  echo "<script language=JavaScript> alert('ออกจากระบบสำเร็จ'); location='../index.php'; </script>"
 ?>
