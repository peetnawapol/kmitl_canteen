<?php require_once("function/connect.php"); 
      
      session_start();

      $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto font-weight-light d-sm-block d-xs-block d-md-block d-lg-none d-xl-none" href="index.php">KMITL CANTEEN</a>
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
    <a class="navbar-brand mx-auto font-weight-light d-none d-lg-block d-xl-block" href="index.php">KMITL CANTEEN</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart"></i><span class="notification"><?php 
          if (!isset($_SESSION['strQty'])) {
              echo 0;
          } else {
              if (array_sum($_SESSION['strQty']) > 9) { 
                echo "9+";
              } else {
                echo array_sum($_SESSION['strQty']);
              }
          }
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
                <span class="d-flex justify-content-center"><span class="orange-text mr-2"><?=$food['food_name'];?></span> - ฿<?=$food['food_price']?> X<?=$_SESSION['strQty'][$i]?></span>
                <?php } }
            ?>
            <span class="page_cartcount">ยอดสุทธิ ฿<?=$sumtotal;?></span>
            <div class="row w-100 mt-4">
            <div class="col d-flex justify-content-center align-items-center">
            <?php if (!isset($_SESSION['loggedin'])) { ?>
            <button type="button" class="btn btn-amber" onclick="window.location.href='account.php'">สั่งเลย!</button><?php } else { ?>
              <!-- <form name="order" method="post" enctype="multipart/form-data">
              <?php 
              // if(array_sum($_SESSION['strQty']) > 0) {
              //     $sumtotal = 0;
              //     $total = 0;

              //     for($i=0; $i<=$_SESSION["items"]; $i++) {
              //         if($_SESSION["strQty"][$i]!="")
              //         {
              //             $cartquery="SELECT * FROM food WHERE fid = '".$_SESSION["strID"][$i]."' ";
              //             $cartsql=$conn->query($cartquery);
              //             $food=$cartsql->fetch_assoc();
              //             $total=$_SESSION["strQty"][$i] * $food["food_price"];
              //             $sumtotal = $sumtotal + $total; 

                    ?>
                <input type="hidden" value="<?=$_SESSION['u_name']?>" name="name">
                <input type="hidden" value="<?=$_SESSION['strQty'][$i];?>" name="tel">
                <input type="hidden" value="place" name="food">
                <input type="hidden" value="key" name="canteen">
                <input type="hidden" value="key" name="resta">
                <input type="hidden" value="key" name="qty">
                      <?php// } } } ?> -->
            <button type="button" class="btn btn-amber" onclick="return checkOut()">
            สั่งเลย!
            </button>
            <!-- </form> <?php } ?> -->
              <a href="" onclick="resetCart()" class="white-text small-text">ลบทั้งหมด</a>
            </div>
            </div>
              <?php
          }
        else {
            echo "<span class='d-flex justify-content-center orange-text'>โปรดเลือกรายการอาหาร</span>";
        }
          ?>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="account.php"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user mr-1"></i>Profile
        </a>
      </li>
        </ul>
    </div>
    </div>
</nav>
<script type="text/javascript">
    function resetCart() {
        let xhr = new XMLHttpRequest();
        xhr.onload = function() {
            document.location = window.location.reload(history.back());
        }
        xhr.open('GET', 'function/inc/clear_cart.php', true);
        xhr.send();
    }

    function checkOut() {
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;
      $.ajax({
              type : "POST",  //type of method
              url  : "profile.php",  //your page
              data : { name : name, email : email, password : password },// passing the values
              success: function(res){  
                                      //do what you want here...
                      }
          });

    }
</script>