<?php
  ob_start();
  session_start();
  $sess_username=$_SESSION["sess_username"];
?>

<div><h4> <?php echo $sess_username; ?> are logged in</h4></div>
<div><a href="logout.php" class="login">Logout</a></div>
<br><br>
<div><h3>[ &nbsp; Cart &nbsp; ]</h3></div>
<?php
  $total = 0;
  $sumtotal = 0;
?>
  <center>
  <table class="cart">
    <tr style="color:#FFF;">
      <th>ภาพอาหาร</th>
      <th>ชื่ออาหาร</th>
      <th>จำนวน</th>
      <th>รวม</th>
      <th> </th>
    </tr>
<?php
  for($i=0; $i<=$_SESSION["cntLine"]; $i++)
  {
  if($_SESSION["strQty"][$i]!="")
  {
    $sql2="SELECT * FROM product WHERE id = '".$_SESSION["strID"][$i]."' ";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $total=$_SESSION["strQty"][$i] * $row2["price"];
    $sumtotal = $sumtotal + $total;
 ?>
        <tr>
          <td><img width="60px" height="auto" src="images/<?php echo $row2["url"]; ?>"</img></td>
          <td><?php echo $row2["name"]; ?></td>
          <td><?php echo $_SESSION["strQty"][$i]; ?></td>
          <td><?php echo number_format($total,2); ?></td>
          <td><a class="cart" href="delete.php?Line=<?php echo $i; ?>">X &nbsp;&nbsp;</a></td>
        </tr>
  <?php
    }
  }
?>
  <tr><td rowspan="2" colspan="5">ยอดสั่งซื้อรวม: <?php echo $sumtotal; ?> บาท</td></tr>
  <tr></tr>
  <tr><td colspan="5"><a class="login" href="bill.php">Check Out</a></td></tr>
  </table>
  </center>
