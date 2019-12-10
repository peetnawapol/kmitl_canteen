<?php require_once("function/connect.php");
    $query = "SELECT * 
    from food as f
    inner join restaurant as r
    on f.res_ref = r.res_id
    inner join canteen as c
    on c.cid = r.can_ref WHERE f.fid=$_GET[menu] ";
    $result = $conn->query($query);
?>
<div class="row mt-5 mb-5 p-4">
    <h1 class="h1-responsive text-white text-center display-4 font-weight-light ml-3 mt-2 mb-5">CHOOSE YOUR <span class="orange-text">CANTEEN</span></h1>
    <span class="w-100"></span>
    <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 pr-3 pl-3 mb-4">
    <a href="order.php?canteen=<?=$row['cid']?>&res=<?=$row['res_id']?>&menu=<?=$row['fid']?>" class="canteen_link">
    <div class="col align-self-center">
    <i class="fas fa-utensils d-flex align-items-center justify-content-center"></i>
    <span class="d-flex align-items-end justify-content-center mt-3"><?=$row['cname']?></span>
    </div>
    </a>
    </div>
    <?php } ?>
</div>