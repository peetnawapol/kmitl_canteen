<?php require_once("function/connect.php"); 
      session_start();

    $name = $_GET['name'];
    $sqli = "SELECT * FROM order_lists WHERE order_lists.customer_name='$name' ORDER BY order_lists.time DESC";
    $resord = $conn->query($sqli); 

?>
<!-- ส่วนแสดงรายการอาหาร -->

<div class="row mt-5 mb-5 p-4 d-flex justify-content-center">

<?php if(isset($_GET['name'])) { ?>

<h1 class="h1-responsive text-white text-center display-4 pl-2 font-weight-light mt-2 mb-5 text-uppercase"><span class="orange-text"><?=$_GET['name'];?></span> ORDER</h1>

<span class="w-100"></span>

<div class="col-xl-8 col-lg-8 col-md-10 col-sm-10 col-xs-12 page-wrap mt-0 pl-2 pr-2">
  <table class="table">
  <thead>
    <tr class="orange-text">
      <th scope="col">#</th>
      <th scope="col">Menu</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody id="interval">
    <?php
    if ($resord->num_rows > 0) {
    while ($row = $resord->fetch_assoc()) {
    $dateTime = date_create($row['time']);
    $order = date_format($dateTime, 'd-m-Y H:i:s');
    if ($row['status'] == "NOT_PROCESS") {
      $row['status'] = "WAITING";
    }
    if ($row['status'] == "PROCESS") {
      $row['status'] = "PROCESSING";
    }
    if ($row['status'] == "FINISH") {
      $row['status'] = "FINISHED";
    }
    ?>
    <tr id="order">
      <th scope="row"><?php echo $order;?></th>
      <td><?php echo $row['food_name'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td>
        <?php if($row['status'] == "WAITING") { ?>
        <small><p class="text-white text-center bg-warning rounded pr-2 pl-2 pt-1 pb-1 ml-3"><?php echo $row['status'];?></p></small>
        <?php } ?>
        <?php if($row['status'] == "PROCESSING") { ?>
        <small><p class="text-white text-center bg-info rounded pr-2 pl-2 pt-1 pb-1 ml-3"><?php echo $row['status'];?></p></small>
        <?php } ?>
        <?php if($row['status'] == "FINISHED") { ?>
        <small><p class="text-white text-center bg-success rounded pr-2 pl-2 pt-1 pb-1 ml-3"><?php echo $row['status'];?></p></small>
        <?php } ?>
      </td>
    </tr>
    <?php } } else { die('error'); }?>
  </tbody>
</table>
</div> 
<?php } else { ?>
<h1 class="h1-responsive text-white text-center d-flex justify-content-center w-100 display-4 pl-2 font-weight-light mt-2 mb-5"><span class="orange-text">กรุณาสั่งอาหาร</span></h1>
<button class="btn btn-amber mx-auto mt-3 mb-2 " onclick="window.location.href='index.php'">BACK TO HOME</button>
<?php } ?>
</div>
<script>
//รีโหลดหน้าใหม่
setInterval("timeRe();",1000); 

function timeRe(){
      $('#interval').load(location.href + ' #order');
}
</script>