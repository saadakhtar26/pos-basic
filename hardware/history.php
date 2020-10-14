<?php include("includes/db-connection.php"); ?>

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
                                        <strong class="card-title">Dasti Khata History</strong>
                                    </div>
                                    <div class="card-body">
                                    <?php
                                    $sql = 'SELECT * FROM `dasti_khata` WHERE `status`=0';
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result) > 0) { ?>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Discription</th>
                                                    <th>Date</th>
                                                    <th>Received</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row["person_name"]; ?></td>
                                                    <td><?php echo $row["disc"]; ?></td>
                                                    <td><?php echo $row["due_date"]; ?></td>
                                                    <td><?php echo $row["amount"]; ?></td>
                                                    <?php if($row["they_pay"]==1){
                                                        $status = "Someone Pay (kisi ne hmaray dene hein)";
                                                    }
                                                    else{
                                                        $status = "We Pay (Hum ne kisi k dene hein)";
                                                    } ?>
                                                    <td><?php echo $status; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else{echo "<br><span>No History Available</span>";} ?>
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

    <?php include("includes/scripts-list.php"); mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->
