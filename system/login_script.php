<?php
  ob_start();
  include "connect.php";
  $user = $_POST['user_log'];
  $pass = $_POST['pass_log'];
   
  echo $user;
  echo $pass;
  if($user == '' or $pass == '')
  {

    echo "<script language=JavaScript> alert('blank'); location='login.html';</script>";

  }
  else
  {
    $find = "SELECT * FROM `customer_member` WHERE name='$user' and pass='$pass'";
    $result = $conn->query($find);

      while($row = $result->fetch_assoc())
      {
        session_start();
        $_SESSION['id'] =  $row['uid'] ;
        $_SESSION['store'] =  $row['store_name'];
        echo "<script language=JavaScript>location='dash_board.php';</script>";

    }
  }
 ?>
