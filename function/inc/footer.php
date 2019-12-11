<?php require_once("function/connect.php");
    $query = "SELECT * 
    from canteen ORDER BY cid DESC";
    $result = $conn->query($query);

    $cat_query = "SELECT * 
    from category ORDER BY cat_id DESC";
    $cat_res = $conn->query($cat_query);
?>
<!-- Footer -->
<footer class="page-footer font-small own-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row d-flex align-items-center" style="height: auto; padding: 4rem 0 4rem 0;">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase mb-3">KMITL CANTEEN 2019</h5>
        <p style="color: rgb(165,176,193);">This is a web application for reduce times to waiting any restaurant in many canteen of KMITL</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">ประเภทอาหาร</h5>

        <ul class="list-unstyled mt-2">
          <?php while($cat = $cat_res->fetch_array(MYSQLI_ASSOC)) { ?>
          <li>
            <a href="#"><?=$cat['cat_name']?></a>
          </li>
          <?php } ?>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">โรงอาหาร</h5>

        <ul class="list-unstyled mt-2">
          <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
          <li>
            <a href="#!"><?=$row['cname'];?></a>
          </li>
          <?php } ?>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    CodeGathon Team
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->