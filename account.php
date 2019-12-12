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
    <?php if(!isset($_SESSION['loggedin'])) { ?>
    PLEASE <span class="orange-text">SIGN IN</span>
    <?php } else { ?>
    WELCOME! <span class="orange-text text-uppercase"><?=$_SESSION['u_name'];?></span>
    <?php } ?>
  </h1>
    <span class="clear-fix w-100"></span>
  </div>
  <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-6 order-lists sign-in p-4 pl-5 pr-5 mb-3 mt-2">
  <?php if(!isset($_SESSION['loggedin'])) { ?>
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
    <div class="row w-100 mt-4">
            <div class="col d-flex justify-content-center align-items-center">
            <input type="submit" class="btn btn-amber mr-3" value="SIGN IN">
            or <a href="" class="white-text small-text pl-3"> create an account</a>
            </div>
            </div>
    </form>
  <?php } else { 
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
            <input type="submit" class="btn btn-amber mr-3 disabled" value="UPDATE">
            or <a href="?signout=1" class="white-text small-text pl-3"> SIGN OUT</a>
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