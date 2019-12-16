<?php if(isset($_GET['can_id'])) { 

require_once("function/connect.php");

$food3 = "SELECT * FROM restaurant as r
  INNER JOIN canteen as c
  ON c.cid = r.can_ref
  WHERE r.can_ref = $_GET[can_id]
  ";

$res4 = $conn->query($food3);

$row = $res4->fetch_array(MYSQLI_ASSOC);
?>
<div class="row mt-5 mb-5 p-4">

<?php if(!empty($row['res_name'])) { ?>
<h1 class="h1-responsive text-white text-center display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text"><?=$row['cname']?></span> @ KMITL</h1>
<?php } else { ?>
<h1 class="h1-responsive text-white text-center d-flex justify-content-center w-100 display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text">ไม่พบร้านอาหาร :(</span></h1>
<button class="btn btn-amber mx-auto mt-3 mb-2 " onclick="window.location.href='index.php'">BACK TO HOME</button>
<?php } ?>
<span class="w-100"></span>

 <!-- Row for Beverage -->
  <?php while($row2 = $res4->fetch_array(MYSQLI_ASSOC)) { ?>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 pr-3 pl-3 mb-4">

<a href="?rel=restaurant&id=<?=$row2['res_id']?>" class="canteen_link">

<div class="col align-self-center">

<i class="fas fa-utensils d-flex align-items-center justify-content-center"></i>

<span class="d-flex align-items-end justify-content-center mt-3"><?=$row2['res_name']?></span>

</div>

</a>

</div>

<?php } ?>

</div>
  <?php } else { echo "<script>window.location.href='index.php '</script>"; }?>