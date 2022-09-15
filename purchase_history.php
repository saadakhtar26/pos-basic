<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head.php") ?>
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

                        <!--Data Table Start-->
                        <div class="row">
                            <div class="content mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Invoices List</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Purchase</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(($_SERVER["REQUEST_METHOD"]=="GET") && (!empty($_GET["id"]))){
                                                    $id = $conn->real_escape_string($_GET["id"]);
                                                    include("includes/db-connection.php");
                                                    $sql = 'SELECT * FROM `invoice` WHERE `cust_id`=' . $id;
                                                    $result = mysqli_query($conn,$sql);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr>
                                                    <td><a href="view_invoice.php?id=<?php echo $row["id"]; ?>" target="_blank" style="color: blue; text-decoration:underline;" class="item">View Invoice</a></td>
                                                    <td>Rs.<?php echo $row["total"]; ?></td>
                                                    <td><?php echo $row["date"]; ?></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Data Table END-->
                        <?php include("includes/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/scripts.php"); mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->
