<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>
    <?php
    include("includes/db-connection.php");
    if (($_SERVER["REQUEST_METHOD"]=="GET") && (!empty($_GET["id"]))) {
            $sql = 'SELECT * FROM invoice WHERE id=' . $_GET["id"];
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $sql2 = 'SELECT `name` FROM `customer` WHERE `id`=' . $row["cust_id"];
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
    ?>
    <div>
        <?php include("includes/sidebar.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="card-header">
                                    <strong>Edit</strong> Invoice
                                </div>
                                <div class="card-body card-block">
                                    <form action="edit_notif.php" method="post">
                                        <!--Hidden ID input-->
                                        <?php
                                        $sql3 = "SELECT `chain_id` FROM `invoice` WHERE `id`=" . $_GET["id"];
                                        $result3 = mysqli_query($conn,$sql3);
                                        $row3 = mysqli_fetch_assoc($result3);
                                        $target_chain_id = $row3["chain_id"];

                                        if($target_chain_id!=0){
                                            $sql4 = "SELECT SUM(received) FROM `invoice` WHERE `chain_id`=" . $target_chain_id . " OR `id`=" . $target_chain_id;
                                            $result4 = mysqli_query($conn,$sql4);
                                            if(mysqli_num_rows($result4)>0){
                                                $row4 = mysqli_fetch_assoc($result4);
                                                $total_received = $row4["SUM(received)"];
                                            }
                                        }
                                        else{
                                            $sql4 = "SELECT SUM(received) FROM `invoice` WHERE `id`=" . $_GET["id"];
                                            $result4 = mysqli_query($conn,$sql4);
                                            if(mysqli_num_rows($result4)>0){
                                                $row4 = mysqli_fetch_assoc($result4);
                                                $total_received = $row4["SUM(received)"];
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>">
                                        <input type="hidden" name="date" value="<?php echo $row["date"]; ?>">
                                        <input type="hidden" name="time" value="<?php echo $row["time"]; ?>">
                                        <input type="hidden" name="cust_id" value="<?php echo $row["cust_id"]; ?>">
                                        <input type="hidden" id="last_received" name="last_received" value="<?php echo $total_received; ?>">

                                        <!--Hidden total input-->
                                        <input type="hidden" name="total" id="total" value="<?php echo $row["total"]; ?>">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--received Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Received</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input oninput="calc();" type="text" id="received" name="received" value="0" class="form-control">
                                                </div>
                                            </div>
                                            <!--received END-->
                                            <!--pending Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Pending</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="pending" name="pending" value="<?php echo $row["pending"]; ?>" readonly class="form-control">
                                                </div>
                                            </div>
                                            <!--pending END-->
                                        </div>

                                        <div class="row">
                                            <!--due date Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Payment Date</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="date" min="<?php echo date("Y-m-d",strtotime("-1 day")); ?>" value="<?php echo date("Y-m-d",strtotime("-1 day")); ?>" id="due_date" name="due_date" class="form-control">
                                                </div>
                                            </div>
                                            <!--due date END-->
                                        </div>
                                        <!--Row 2 End-->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php include("includes/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $query = "SELECT `chain_id` FROM `invoice` WHERE `id`=" . $_POST["id"];
        $return = mysqli_query($conn,$query);
        $line = mysqli_fetch_assoc($return);

        if($line["chain_id"]==0){
            $chain_id = $_POST["id"];
        }
        else{
            $chain_id = $line["chain_id"];
        }
        if($_POST["pending"]==0){
            $pending_status = 0;
            echo $sql5 = "UPDATE `invoice` SET `pending_status`=0 WHERE `chain_id`=" . $chain_id . " OR `id`=" . $chain_id;
            $result5 = mysqli_query($conn,$sql5);
        }
        else{
            $pending_status = 1;
        }
        $sql2 = "INSERT INTO `invoice`(`id`,`date`,`time`,`total`,`received`, `pending`, `due_date`,`cust_id`,`chain_id`,`pending_status`) VALUES(NULL, '" . $_POST["date"] . "', '" . $_POST["time"] . "', '" . $_POST["total"] . "', '" . $_POST["received"] . "', '" . $_POST["pending"] . "', '" . $_POST["due_date"] . "', '" . $_POST["cust_id"] . "', '" . $chain_id . "', '" . $pending_status . "')";
        mysqli_query($conn,$sql2);

        $staus = true;
    }
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($staus==true)) {
        echo "<script>location.href='http://localhost/pos/ply-wood/pending/index.php?page=3';</script>";
    }
    include("includes/scripts-list.php");
    mysqli_close($conn);
    ?>
    <script>
        function calc(){
            let received = document.getElementById("received");
            let last_received = document.getElementById("last_received");
            let pending = document.getElementById("pending");
            let total = document.getElementById("total");
            let total_received = Math.abs(received.value) + Math.abs(last_received.value);
            pending.value = Math.abs(total.value) - Math.abs(total_received);
        }
    </script>
</body>
</html>
<!-- end document-->