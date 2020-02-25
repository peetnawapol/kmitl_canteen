<div class="container-fluids p-5">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <h2>Order</h2>
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order By</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect.php';
                        session_start();
                        $store = $_SESSION['store'];
                        $sql = "SELECT * FROM order_lists WHERE res_name='$store' AND status='NOT_PROCESS' ORDER BY time DESC;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                            while ($row = $result->fetch_assoc()) {
                                $order = $row["id_order"];
                                ?>
                            <tr>
                                <th scope="row"><?php echo $row['time']; ?></th>
                                <td><?php echo $row["customer_name"]; ?></td>
                                <td><?php echo $row["food_name"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><a class="btn btn-primary mb-2 ml-2" role="button" href="submit.php?id=<?php echo $order;?>">SUBMIT</a>
                                <a class="btn btn-danger mb-2 ml-2" role="button" href="cancel.php?id=<?php echo $order;?>" >CANCEL</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <h2>Process</h2>
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">time</th>
                            <th scope="col">Order By</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM order_lists WHERE res_name='$store' AND status='PROCESS' ORDER BY time DESC;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                            while ($row = $result->fetch_assoc()) {
                                $order = $row["id_order"];
                                ?>
                        <tr>
                            <th scope="row"><?php echo $row['time'];?></th>
                            <td><?php echo $row["customer_name"]; ?></td>
                            <td><?php echo $row["food_name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><a class="btn btn-success" role="button" href="finish.php?id=<?php echo $order;?>">FINISH</a></td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>