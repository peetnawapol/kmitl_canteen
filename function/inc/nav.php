<?php require_once("function/connect.php"); 
      
      session_start();

?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active mr-3">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Category</a>
        </li>
        </ul>
    </div>
    <a class="navbar-brand mx-auto font-weight-light" href="index.php">KMITL CANTEEN</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart"></i><span class="notification"><?php 
              echo array_sum($_SESSION['strQty']);
          
          ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-cart dropdown-menu-right dropdown-default "
          aria-labelledby="navbarDropdownMenuLink-333">
          <?php 
          if(array_sum($_SESSION['strQty']) > 0) {
            $sumtotal = 0;
            $total = 0;

            for($i=0; $i<=$_SESSION["items"]; $i++) {
                if($_SESSION["strQty"][$i]!="")
                {
                    $cartquery="SELECT * FROM food WHERE fid = '".$_SESSION["strID"][$i]."' ";
                    $cartsql=$conn->query($cartquery);
                    $food=$cartsql->fetch_assoc();
                    $total=$_SESSION["strQty"][$i] * $food["food_price"];
                    $sumtotal = $sumtotal + $total; 

                    ?>
                <span class="d-flex justify-content-center"><?=$food['food_name'];?> - ฿<?=$food['food_price']?> X<?=$_SESSION['strQty'][$i]?></span>
                <?php } 
            }
          }
        else {
            echo "<span class='d-flex justify-content-center orange-text'>โปรดเลือกรายการอาหาร</span>";
        }
          ?>
        </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user mr-1"></i>Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Edit</a>
          <a class="dropdown-item" href="#">Sign out</a>
        </div>
      </li>
        </ul>
    </div>
    </div>
</nav>