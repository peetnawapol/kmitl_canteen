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
                    $cartquery="SELECT * FROM food
                     WHERE food.fid = '".$_SESSION["strID"][$i]."'";
                    $cartsql=$conn->query($cartquery);
                    $food=$cartsql->fetch_assoc();
                    $total=$_SESSION["strQty"][$i] * $food["food_price"];
                    $sumtotal = $sumtotal + $total; 

                    ?>
                <span class="d-flex justify-content-center">
                  <span class="orange-text mr-2">
                    <?=$food['food_name'];?></span> - ฿<?=$food['food_price']?> X<?=$_SESSION['strQty'][$i]?> 
                    <small><p class="text-white text-center bg-info rounded pl-2 pr-2 ml-3">WAITING</p></small>
                  </span>
                <?php } } ?>
            <span class="page_cartcount">ยอดสุทธิ ฿<?=$sumtotal;?></span>
            <div class="row w-100 mt-4">
            <div class="col d-flex justify-content-center align-items-center">
            <!-- if not log in -->
            <?php if (!isset($_SESSION['loggedin'])) { ?>
            <button type="button" class="btn btn-amber" onclick="window.location.href='account.php'">สั่งเลย!</button>
            <!-- if logged in -->
            <?php } else { ?>
            <form method="post" class="d-flex justify-content-center w-50">
              <?php

              if(array_sum($_SESSION['strQty']) > 0) {
                  $sumtotal = 0;
                  $total = 0;

                  if(isset($_POST['submit'])) {
                    $f_arr = array();
                    $date = new DateTime();
                    
                    for($i=0; $i<=$_SESSION["items"]; $i++) { 
                      if($_SESSION["strQty"][$i]!="")
                      { 
                        $cartquery="SELECT * FROM food
                         inner join restaurant as r 
                          on r.res_id = food.res_ref
                          inner join canteen as c
                          on c.cid = r.can_ref
                         WHERE food.fid = '".$_SESSION["strID"][$i]."' ";
                        $cartsql=$conn->query($cartquery);
                        $food=$cartsql->fetch_assoc();
                        $realtime = $date->format('d-m-Y H:i:s');

                      $f_arr[] = array(
                      'id' => NULL,
                      'name' => $_SESSION['u_name'],
                      'food_name' => $food['food_name'],
                      'canteen' => $food['cname'],
                      'restaurant' => $food['res_name'],
                      'qty' => $_SESSION["strQty"][$i], 

                      'status' => 'NOT_PROCESS');
                      }
                    }

              if(is_array($f_arr)) {
                 $sql = "INSERT INTO order_lists (id_order, customer_name, food_name, can_name, res_name, quantity, status) VALUES";
                 $valuesArr = array();
                foreach($f_arr as $row){
                    $id = (int) $row['id'];
                    $nickname = mysqli_escape_string($conn, $row['name']);
                    $fname = mysqli_escape_string($conn, $row['food_name']);
                    $can = mysqli_escape_string($conn, $row['canteen']);
                    $res = mysqli_escape_string($conn, $row['restaurant']);
                    $quan = mysqli_escape_string($conn, $row['qty']);

                    $stat = mysqli_escape_string($conn, $row['status']);

                    $valuesArr[] = "('$id', '$nickname', '$fname', '$can', '$res', '$quan', '$stat')";
                }
                 $sql .= implode(',', $valuesArr);
                 if(mysqli_query($conn, $sql) == TRUE) {
                  unset($_SESSION['items']);
                   unset($_SESSION['strQty']);
                   unset($_SESSION['canteen']);
                   unset($_SESSION['resta']);
                   unset($_SESSION['strID']);
                  header('Location: ' . $_SERVER['HTTP_REFERER']);
                  exit;
                 } else {
                  header('Location: ' . $_SERVER['HTTP_REFERER']);
                  exit;
                 }
               }
                  }
             } ?> 
            <button type="submit" name="submit" class=" btn btn-amber" onclick="window.open ('wait.php?name=<?php echo $_SESSION['u_name'];?>', 'links', 'toolbar=0,location=1,directories=0,status=0,menubar=0,scrollbars=auto,resizable=yes,dependent=yes,width=400,height=400');">
            สั่งเลย!
            </button>
            </form>
            <?php } ?>
              <a href="" onclick="return resetCart()" class="white-text small-text">ลบทั้งหมด</a>
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
            document.location = window.location.reload();
        }
        xhr.open('GET', 'function/inc/clear_cart.php', true);
        xhr.send();
    }

    // function checkOut() {
    //   const params = {
    //   name: document.querySelector("#cust_name").value,
    //   food: document.querySelector("#f_name").value,
    //   res: document.querySelector("#res").value,
    //   qty: document.querySelector("#qty").value
    //   }

    //   $.ajax({
    //   type: "POST",
    //   contentType: "application/json; charset=utf-8",
    //   url: "function/checkout.php",
    //   data: { params },
    //   success: function (result) {
    //        alert('success');
    //   }
    //   });

    // }
</script>