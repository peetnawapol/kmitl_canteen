<?php

if ($_POST['rel'] == "signout") {

  session_start();

  unset($_SESSION['id']);
  unset($_SESSION['store']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit();
}

  echo "<script>window.location.href='login.html'</script>";

 ?>

