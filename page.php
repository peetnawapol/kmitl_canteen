<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <?php if ($_GET['rel'] == "canteen") { ?> 

        <title>Select your canteen</title>

    <?php } ?>

    <?php if ($_GET['can_id']) { ?>

        <title>ค้นหาร้านอาหารจากโรงอาหาร</title>

    <?php } ?>

    <?php if ($_GET['id']) { ?>

    <title>ค้นหาร้านอาหารจากหมวดหมู่</title>

    <?php } ?>

    <?php if ($_GET['rel'] == "restaurant") { ?>

    <title>ค้นหาอาหารจากร้านอาหาร</title>

    <?php } ?>

    <?php if ($_GET['rel'] == "wait") { ?>
      
      <title>Your Order</title>

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

  <?php if (isset($_GET['rel'])) { ?>

  <?php if ($_GET['rel'] == "canteen") { //ถ้า parameter คือ canteen
     include("function/inc/canteen.php"); } ?>

  <?php if ($_GET['rel'] == "category") { //ถ้า parameter คือ category
     include("function/inc/category.php"); } ?>

  <?php if ($_GET['rel'] == "canteen_food") { //ถ้า parameter คือ canteen_food
     include("function/inc/can_post.php"); } ?>

  <?php if ($_GET['rel'] == "restaurant") { //ถ้า parameter คือ restaurant
     include("function/inc/restaurant.php"); } ?>

  <?php if ($_GET['rel'] == "wait") {
      include("wait.php");
  }?> 
  
  <?php } else {
      echo "<script>window.location.href='index.php'</script>";
  } ?>

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