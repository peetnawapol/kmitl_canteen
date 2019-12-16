<?php require_once("function/connect.php"); 
      $query = "SELECT * FROM food as f 
      inner join restaurant as r 
      on r.res_id = $_GET[res]
      inner join canteen as c
      on c.cid = $_GET[canteen]
      WHERE f.fid = $_GET[menu] and r.can_ref = $_GET[canteen]";
      $result = $conn->query($query);

      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($_GET['action'] == "add") {
        //fisrt order
        if(!isset($_SESSION["items"]))
        {
          $_SESSION["items"] = 0;
          $_SESSION["strID"][0] = $row["fid"];
          $_SESSION["strQty"][0] = 1;
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
        else
        {
          $key = array_search($row["fid"], $_SESSION["strID"]);
            if((string)$key!="")
            {
              $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
            }
            else
            {
              $_SESSION["items"] = $_SESSION["items"] + 1;
              $cntNewLine = $_SESSION["items"];
              $_SESSION["strID"][$cntNewLine] = $row["fid"];
              $_SESSION["strQty"][$cntNewLine] = 1;
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
    }}

    if ($_GET['action'] == 'reset') {
      //fisrt order
      if(!isset($_SESSION["items"]))
      {
        $_SESSION["items"] = 0;
        $_SESSION["strID"][0] = $row["fid"];
        $_SESSION["strQty"][0] = 0;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
      }
      else
      {
        $key = array_search($row["fid"], $_SESSION["strID"]);
          if((string)$key!="")
          {
            $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] - 1;
          }
          else
          {
            $_SESSION["items"] = $_SESSION["items"] - 1;
            $cntNewLine = $_SESSION["items"];
            $_SESSION["strID"][$cntNewLine] = $row["fid"];
            $_SESSION["strQty"][$cntNewLine] = 1;
          }
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit;
  }
    }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$row['food_name']?> - <?=$row['res_name']?></title>

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
    <span class="orange-text"><?=$row['food_name']?></span> @ <?=$row['res_name']?>
  </h1>
    <span class="w-100"></span>
    <small class="col d-flex justify-content-center mb-4">
      <i class="fas fa-map-marker-alt mr-2"></i><?=$row['cname']?>
    </small>
    <span class="clear-fix w-100"></span>
  </div>
  <div class="col-xl-6 col-lg-7 col-md-10 col-sm-8 col-xs-6 order-lists p-4 mb-3">
    <span class="page_cartcount">
      <i class="fas fa-shopping-cart mr-1"></i>
      <?php 
      if (!$_SESSION['strQty'][array_search($row["fid"], $_SESSION["strID"])]){
        echo 0; 
      } else {
        echo $_SESSION['strQty'][array_search($row["fid"], $_SESSION["strID"])]; 
      } ?>
    </span>
    <div class="row d-flex justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 d-flex justify-content-center">
    <img src="<?=$row['food_img']?>" alt="<?=$row['food_name']?>" class="rounded-circle img-fluid" >
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 mt-4">
    <i class="fas fa-quote-left mr-2"></i><?=$row['food_desc']?>
    <span class="w-100"></span>
    <p class="orange-text mt-2">฿<?=$row['food_price']?></p>
    <span class="w-100 clear-fix"></span>
    <div class="row  mt-4">
    <div class="col align-items-center">
    <button type="button" class="btn btn-amber ml-0 mr-4" onclick="window.location.href='?canteen=<?=$row['cid'];?>&res=<?=$row['res_id']?>&menu=<?=$row['fid'];?>&action=add'">เพิ่มในรายการ X1</button>
  <?php if($_SESSION['strQty'][array_search($row["fid"], $_SESSION["strID"])] > 0) { ?><a href="?canteen=<?=$row['cid'];?>&res=<?=$row['res_id']?>&menu=<?=$row['fid'];?>&action=reset">ลบ</a><?php } ?>
    </div>
    </div>
    </div>
    </div>
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