<?php require_once("function/connect.php"); 
$query = "SELECT * FROM food as f 
inner join restaurant as r 
on r.res_id = f.res_ref
WHERE f.cat_ref=1 or f.cat_ref=2 or f.cat_ref=3 
ORDER by f.fid DESC LIMIT 4";
$result = $conn->query($query);

?>
<div class="row p-3 d-flex h-100 pb-5 pt-0">
      <!-- Row for Recommended Meal -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-award mr-2" ></i>Recommended Meal
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row['fid']?>" class="trending">
          <img src="<?=$row['food_img']?>" alt="<?=$row['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row['food_name']?> - <?=$row['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>