<?php if(isset($_GET['id'])) { 

require_once("function/connect.php");

$sqlfr = "SELECT * FROM food as f
    INNER JOIN restaurant as r
    ON r.res_id = f.res_ref
    INNER JOIN canteen as c
    ON c.cid = r.can_ref
    WHERE f.res_ref = $_GET[id] ORDER BY f.fid DESC";

$que2 = $conn->query($sqlfr);

$rowt = $que2->fetch_array(MYSQLI_ASSOC);
?>
<div class="row mt-5 mb-5 p-4">
<?php if(!mysqli_num_rows($rowt)) { ?>
<h1 class="h1-responsive text-white text-center display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text"><?=$rowt['res_name']?></span> @ <?=$rowt['cname']?></h1>
<?php } else { ?>
<h1 class="h1-responsive text-white text-center d-flex justify-content-center w-100 display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text">ไม่พบรายการอาหาร :(</span></h1>
<button class="btn btn-amber mx-auto mt-3 mb-2 " onclick="window.location.href='index.php'">BACK TO HOME</button>
<?php } ?>
<span class="w-100"></span>

<div class="row p-3 d-flex h-100 pb-4 pt-0">
  <!-- Row for FOOD -->
  <?php while($rest = $que2->fetch_array(MYSQLI_ASSOC)) { ?>
  <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
    <a href="order.php?canteen=<?=$rest['cid']?>&res=<?=$rest['res_ref']?>&menu=<?=$rest['fid']?>" class="trending">
      <img src="<?=$rest['food_img']?>" alt="<?=$rest['food_name']?>" class="img-fluid rounded hoverable">
      <h3><?=$rest['food_name']?> - <?=$rest['res_name']?></h3>
    </a>
  </div>
  <?php } ?>
</div>

</div>
  <?php } else { echo "<script>window.location.href='index.php '</script>"; }?>