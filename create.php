<?php require_once("function/connect.php"); //สร้างผู้ใช้งานใหม่
    if(isset($_POST['submit'])) {
        if (!isset($_POST['student_id'], $_POST['password'], $_POST['nickname'], $_POST['faculty'])) {
            die ('Please complete the registration form!');
        } else {
        if ($stmt = $conn->prepare('SELECT uid, u_pass FROM member WHERE std_id = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
            $stmt->bind_param('s', $_POST['student_id']);
            $stmt->execute();
            $stmt->store_result();
            // Store the result so we can check if the account exists in the database.
            if ($stmt->num_rows > 0) {
                // Username already exists
                echo '<script>alert("มี User ID นี้อยู่ในระบบแล้ว")</script>';
            } else {
                if ($stmt = $conn->prepare('INSERT INTO member (std_id, u_pass, nickname, faculty) VALUES (?, ?, ?, ?)')) {
                    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                    $password = $_POST['password'];
                    $stmt->bind_param('ssss', $_POST['student_id'], $password, $_POST['nickname'], $_POST['faculty']);
                    $stmt->execute();

                    require("function/authentication.php");
                } else {
                    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                    echo '<script>alert("Something went wrong")</script>';
                }
            }
            $stmt->close();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
        $conn->close(); 
    } 
}

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
    CREATE AN <span class="orange-text">ACCOUNT</span>
    <?php } else { //ถ้าล็อกอินแล้วให้ redirect ไปหน้า account ?>
        <script>window.location.href='account.php'</script>
    <?php } ?>
  </h1>
    <span class="clear-fix w-100"></span>
  </div>
  <!-- Register Form -->
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
    <div class="md-form">
        <i class="fas fa-user prefix"></i>
        <input type="text" name="nickname" class="form-control validate" maxlength="8" size="8" required>
        <label for="nickname" data-error="wrong" data-success="right">ชื่อเล่น</label>
    </div>
    <div class="md-form">
        <i class="fas fa-user prefix"></i>
        <input type="text" name="faculty" class="form-control validate" maxlength="8" size="8" required>
        <label for="faculty" data-error="wrong" data-success="right">คณะ/สาขา</label>
    </div>
    <div class="row w-100 mt-4">
            <div class="col d-flex justify-content-center align-items-center">
            <input type="submit" class="btn btn-amber mr-3" name="submit" value="CREATE">
            </div>
            </div>
    </form>
  <?php } else { 
    header('Location: account.php'); 
    exit; } ?>
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