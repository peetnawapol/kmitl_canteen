<?php
  ob_start();
  include "connect.php";
  $user = $_POST['user_log'];
  $pass = $_POST['pass_log'];

  if($user == '' or $pass == '')
  {

    echo "<script>window.location.href='login.html'</script>";

  }
  else
  {
    $find = "SELECT * FROM `customer_member` WHERE customer_member.name='$user' and customer_member.pass='$pass'";
    $result = $conn->query($find);

      while($row = $result->fetch_assoc())
      {
        session_start();
        $_SESSION['id'] =  $row['uid'] ;
        $_SESSION['store'] =  $row['store_name'];
        echo "<script>location='dash_board.php'</script>";

    }
  }
 ?>
