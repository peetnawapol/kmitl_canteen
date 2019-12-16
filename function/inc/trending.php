<?php require_once("function/connect.php"); 

if(!isset($_GET['search'])) {
  $query = "SELECT * FROM food as f 
  inner join restaurant as r 
  on r.res_id = f.res_ref
  WHERE f.cat_ref=1 or f.cat_ref=2 or f.cat_ref=3 
  ORDER by f.fid DESC LIMIT 4";
  $result = $conn->query($query);

?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
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
<?php 
  $food1 = "SELECT * FROM food as f 
  inner join restaurant as r 
  on r.res_id = f.res_ref
  inner join category as c 
  on c.cat_id = f.cat_ref
  WHERE f.cat_ref=1 
  ORDER by f.fid DESC LIMIT 4";
  $result2 = $conn->query($food1);
?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <!-- Row for Rice Meal -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-utensils mr-2" ></i>Rice Meal
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($row2 = $result2->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row2['fid']?>" class="trending">
          <img src="<?=$row2['food_img']?>" alt="<?=$row2['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row2['food_name']?> - <?=$row2['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>
<?php 
  $food1 = "SELECT * FROM food as f 
  inner join restaurant as r 
  on r.res_id = f.res_ref
  inner join category as c 
  on c.cat_id = f.cat_ref
  WHERE f.cat_ref=2 
  ORDER by f.fid DESC LIMIT 4";
  $result2 = $conn->query($food1);
?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <!-- Row for Noodles -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-grip-lines-vertical mr-2" ></i>Noodles
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($row2 = $result2->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row2['fid']?>" class="trending">
          <img src="<?=$row2['food_img']?>" alt="<?=$row2['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row2['food_name']?> - <?=$row2['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>
<?php 
  $food2 = "SELECT * FROM food as f 
  inner join restaurant as r 
  on r.res_id = f.res_ref
  inner join category as c 
  on c.cat_id = f.cat_ref
  WHERE f.cat_ref=3 
  ORDER by f.fid DESC LIMIT 4";
  $res3 = $conn->query($food2);
?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <!-- Row for Appetizer -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-cookie-bite mr-2" ></i>APPETIZER
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($row3 = $res3->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row3['fid']?>" class="trending">
          <img src="<?=$row3['food_img']?>" alt="<?=$row3['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row3['food_name']?> - <?=$row3['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>
<?php 
  $food3 = "SELECT * FROM food as f 
  inner join restaurant as r 
  on r.res_id = f.res_ref
  inner join category as c 
  on c.cat_id = f.cat_ref
  WHERE f.cat_ref=4 
  ORDER by f.fid DESC LIMIT 4";
  $res4 = $conn->query($food3);
?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <!-- Row for Beverage -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-glass-cheers mr-2" ></i>BEVERAGE
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($row4 = $res4->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row4['fid']?>" class="trending">
          <img src="<?=$row4['food_img']?>" alt="<?=$row4['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row4['food_name']?> - <?=$row4['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>
<!-- Show search result -->
<?php } else { 
  $string = $_POST['search_text'];
  $sesql = "SELECT * FROM food as f
   inner join restaurant as r 
   on r.res_id = f.res_ref
   inner join category as c 
   on c.cat_id = f.cat_ref
   where f.food_name
   like '%".mysqli_real_escape_string($conn, $string)."%'";
  $seaval = $conn->query($sesql);

  if(mysqli_num_rows($seaval)) { //กรณีที่หาพบ
    echo "<script>window.location.href='#search_result'</script>";
  ?>
<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-search mr-2" ></i>Search Results for <span class="white-text"><?=$string;?></span>
      </h2>
      <span class="w-100 mb-3" ></span>
      <?php while($value = $seaval->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4" id="search_result">
        <a href="page.php?rel=canteen&menu=<?=$value['fid']?>" class="trending">
          <img src="<?=$value['food_img']?>" alt="<?=$value['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$value['food_name']?> - <?=$value['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>
<?php } else { //กรณีที่หาไม่พบ ?>
  <div class="row p-3 d-flex justify-content-center align-items-center h-100 pb-4 pt-0">
  <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-search mr-2" ></i>ไม่พบผลการค้นหาสำหรับ <span class="white-text"><?=$string;?></span>
      </h2>
  <span class="clear-fix w-100 mb-3" ></span>
  </div>
<?php } }  ?>