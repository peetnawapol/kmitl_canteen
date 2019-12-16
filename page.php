<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
       $engineer = $_GET['canteen']["c_engineer"];
       $engineer = "โรงอาหารคณะวิศวกรรมศาสตร์";
    ?>
    <?php if ($_GET['rel'] == "canteen") { ?> 
        <title>Select your canteen</title>
    <?php } ?>
    <?php if ($_GET['canteen'] == "c_engineer") { ?>
        <title><?=$_GET['menu']?> at <?=$engineer?></title>
    <?php } ?>

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
  <!-- if page == canteen -->
  <?php if ($_GET['rel'] == "canteen") {  ?>
       <?php include("function/inc/canteen.php"); } ?>
  <!-- if already have canteen -->
  <?php if ($_GET['canteen'] == TRUE) {  include("function/inc/merchant.php"); }?>
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