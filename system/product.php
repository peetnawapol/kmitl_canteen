<center>
<table class="product">
  <tr>
    <th>ID อาหาร</th>
    <th>ภาพอาหาร</th>
    <th>ชื่ออาหาาร</th>
    <th>ราคาอาาหร</th>
    <th>จำนวนที่มี</th>
    <th> </th>
  </tr>

<?php
  include 'connect.php';
  $sql="SELECT * FROM product";
  $result=$conn->query($sql);
  if($result->num_rows > 0)
  while($row=$result->fetch_assoc())
  { ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><img width="120px" height="auto" src="images/<?php echo $row["url"]; ?>"</img></td>
      <td><?php echo $row["price"]; ?>  บาท</td>
      <td><?php echo $row["qty"]; ?></td>
      <td><a class="addcart" href="order.php?ID=<?php echo $row["id"]; ?>">Add to Cart &nbsp;&nbsp;</a></td>
    </tr>
  <?php } ?>
  </table>
</center>
