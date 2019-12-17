<?php require_once("function/authentication.php"); 

?>

<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Account Management</title>



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap core CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">



    <!-- Style sheet -->

    <link rel="stylesheet" href="assets/css/style.css">

    

  </head>

  <body>

  <!-- Background and all contents here -->

  <div id="background">

  <!--Main Navigation-->

    <header>

    <?php include("function/inc/nav.php"); ?>

    </header>

    <!--Main Navigation-->

  <!-- Content Zone -->

  <div class="container page-wrap">

  <div class="row mt-5 mb-5 p-4 d-flex justify-content-center">

  <div class="col-lg-12">

  <h1 class="h1-responsive text-white text-center display-4 pl-2 font-weight-light mt-2 mb-2">

    <?php if(!isset($_SESSION['loggedin'])) { //เช็คถ้ายังไม่ได้ล็อกอิน ให้ล็อกอินก่อน ?>

    PLEASE <span class="orange-text">SIGN IN</span>

    <?php } else { //กรณีที่ล็อกอินแล้ว ให้แสดงคำว่า Welcome ?>

    WELCOME! <span class="orange-text text-uppercase"><?=$_SESSION['u_name'];?></span>

    <?php } ?>

  </h1>

    <span class="clear-fix w-100"></span>

  </div>

  <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-6 order-lists sign-in p-4 pl-5 pr-5 mb-3 mt-2">

  <?php
  if(!isset($_SESSION['loggedin'])) { //ถ้ายังไม่ได้ล็อกอินให้ล็อกอิน ?>

    <form action="" method="post">

    <div class="md-form">

        <i class="fas fa-user prefix"></i>

        <input type="text" name="student_id" class="form-control validate" maxlength="8" size="8" autofocus required>

        <label for="student_id" data-error="wrong" data-success="right">รหัสนักศึกษา</label>

    </div>

    <div class="md-form">

        <i class="fas fa-key prefix"></i>

        <input type="password" name="password" class="form-control validate" required>

        <label for="password" data-error="wrong" data-success="right">รหัสผ่าน</label>

    </div>

    <div class="row mt-4 mb-2">

            <div class="col d-flex justify-content-center align-items-center">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 d-flex justify-content-center p-0 mr-1">
            <input type="submit" class="btn btn-amber" value="SIGN IN">
            </div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 d-flex justify-content-center pr-2 pl-2">
            <span>or</span> 
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 d-flex justify-content-center pl-2 text-center">
            <a href="create.php" class="white-text small-tex"> create an account</a>
            </div>
            </div>

            </div>

    </form>

  <?php } else {  //เชื่อมต่อฐานข้อมูล กรณีที่มีข้อมูล user ในระบบแล้ว

      $stmt = $conn->prepare('SELECT faculty FROM member WHERE std_id = ?');

      // In this case we can use the account ID to get the account info.

      $stmt->bind_param('i', $_SESSION['id']);

      $stmt->execute();

      $stmt->bind_result($faculty);

      $stmt->fetch();

      $stmt->close();

      ?>

    <form method="post">

    <div class="md-form">

        <i class="fas fa-id-card prefix"></i>

        <input type="text" name="student_id" class="form-control" disabled>

        <label for="student_id" class="disabled">รหัสนักศึกษา <?=$_SESSION['id']?></label>

    </div>

    <div class="md-form">

        <i class="fas fa-user prefix"></i>

        <input type="text" name="up_nick" class="form-control" disabled required>

        <label for="student_id" class="disabled">ชื่อเล่น <?=$_SESSION['u_name'];?></label>

    </div>

    <div class="md-form">

        <i class="fas fa-book-open prefix"></i>

        <input type="text" name="facult" class="form-control" disabled required>

        <label for="facult" class="disabled">คณะ <?=$faculty;?></label>

    </div>

    <div class="row w-100 mt-4">

            <div class="col d-flex justify-content-center align-items-center">
            <form action="" method="post">
            <input type="submit" class="btn btn-amber mr-3" name="signout" value="SIGN OUT">
            </form>
            </div>

            </div>

    </form>

  <?php } ?>

  </div>

  </div>

  </div>

  <!-- Footer -->

  <?php include("function/inc/footer.php"); ?>

  </div>

    <!-- JQuery -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap tooltips -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

  </body>

</html>