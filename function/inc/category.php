<?php if(isset($_GET['id'])) { 

    require_once("function/connect.php");
    
    $food3 = "SELECT * FROM category as c
      INNER JOIN food as f
      ON f.cat_ref = c.cat_id
      INNER JOIN restaurant as r
      ON r.res_id = f.res_ref
      WHERE c.cat_id = $_GET[id] ORDER BY f.fid DESC";
  
    $res4 = $conn->query($food3);

    $row = $res4->fetch_array(MYSQLI_ASSOC)
    ?>
<div class="row mt-5 mb-5 p-4">

    <h1 class="h1-responsive text-white text-center display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text"><?=$row['cat_name']?></span> CATEGORY</h1>

    <span class="w-100"></span>

<div class="row p-3 d-flex h-100 pb-4 pt-0">
      <!-- Row for Beverage -->
      <?php while($row4 = $res4->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="col-lg-3 col-md-6 col-sm-6 pl-2 pr-2 mb-4">
        <a href="page.php?rel=canteen&menu=<?=$row4['fid']?>" class="trending">
          <img src="<?=$row4['food_img']?>" alt="<?=$row4['food_name']?>" class="img-fluid rounded hoverable">
          <h3><?=$row4['food_name']?> - <?=$row4['res_name']?></h3>
        </a>
      </div>
      <?php } ?>
</div>

</div>
      <?php } else { echo "<script>window.location.href='index.php '</script>"; }?>