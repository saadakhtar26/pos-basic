<?php include("includes/db-connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>
    <div>
            <?php include("includes/sidebar.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <?php
                        $sql = 'SELECT * FROM `invoice` WHERE `chain_id`=0 AND `pending_status`=0';
                        $result = mysqli_query($conn,$sql);
                        ?>
                            <div class="content mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Invoices List</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php if (mysqli_num_rows($result) > 0) { ?>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Received</th>
                                                    <th>Pending</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $sql5 = "SELECT COUNT(id) FROM `invoice` WHERE `chain_id`=" . $row["id"];
                                                    $result5 = mysqli_query($conn,$sql5);
                                                    $row5 = mysqli_fetch_assoc($result5);

                                                    if($row5["COUNT(id)"]>0){

                                                    $sql3 = "SELECT * FROM `invoice` WHERE `chain_id`='" . $row["id"] . "'";
                                                    $result3 = mysqli_query($conn,$sql3);

                                                    if($row["cust_id"]==0){
                                                        $cust_name = "N/A";
                                                    }
                                                    else{
                                                        $sql2 = 'SELECT name FROM `customer` WHERE id=' . $row["cust_id"] . ' ORDER BY `id` DESC';
                                                        $result2 = mysqli_query($conn,$sql2);
                                                        $row2 = mysqli_fetch_assoc($result2);
                                                        if($row2==NULL){$cust_name = 'N/A';}else{$cust_name = $row2["name"];}
                                                    }

                                                ?>
                                                <tr>
                                                    <td><a target="_blank" style="color: blue; text-decoration:underline;" href="view_invoice.php?id=<?php echo $row["id"]; ?>" class="item">View Invoice</button></td>
                                                    <td><?php echo $row["date"]; ?></td>
                                                    <td><?php echo $cust_name; ?></td>
                                                    <td><?php echo "Rs.".$row["received"]; ?></td>
                                                    <td><?php echo "Rs.".$row["pending"]; ?></td>
                                                    <td><?php echo "Rs.".$row["total"]; ?></td>
                                                </tr>
                                            <?php
                                                if (mysqli_num_rows($result3)>0) {
                                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                                        if($row3["cust_id"]==0){
                                                            $cust_name = "N/A";
                                                        }
                                                        else{
                                                            $sql4 = 'SELECT name FROM `customer` WHERE id=' . $row3["cust_id"] . ' ORDER BY `id` DESC';
                                                            $result4 = mysqli_query($conn,$sql4);
                                                            $row4 = mysqli_fetch_assoc($result4);
                                                            if($row4==NULL){$cust_name = 'N/A';}else{$cust_name = $row4["name"];}
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><a target="_blank" style="color: blue; padding-left:60px; text-decoration:underline;" href="view_invoice.php?id=<?php echo $row3["id"]; ?>" class="item">View Invoice</button></td>
                                                            <td><?php echo $row3["date"]; ?></td>
                                                            <td><?php echo $cust_name; ?></td>
                                                            <td><?php echo "Rs.".$row3["received"]; ?></td>
                                                            <td><?php echo "Rs.".$row3["pending"]; ?></td>
                                                            <td><?php echo "Rs.".$row3["total"]; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php } else { ?>
                                        <span>No Invoices Available</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <?php 
                        include("includes/footer.php"); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/scripts-list.php"); mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->


















    