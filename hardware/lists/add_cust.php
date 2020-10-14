<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $sql = "INSERT INTO `customer`(`id`,`name`,`contact`,`address`,`ref`,`reg_date`) VALUES(NULL,'" . $_POST["name"]  . "', '" . $_POST["contact"] . "', '" . $_POST["address"] . "', '" . $_POST["ref"] . "', CURRENT_DATE)";
    mysqli_query($conn,$sql);
    $status = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../includes/head.php"); ?>
</head>

<body>
    <div>
        <?php include("../includes/sidebar.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="card-header">
                                    <strong>Add</strong> Customer
                                </div>
                                <div class="card-body card-block">
                                    <form action="add_cust.php" method="post">
                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--customer Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--customer Name END-->

                                            <!--customer Contact Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Contact</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="contact" name="contact" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer Contact END-->
                                        </div>
                                        <!--End Row 1-->

                                        <!--Row 2 Start-->
                                        <div class="row">
                                            <!--customer address Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="address" name="address" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer address END-->

                                            <!--customer ref Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Reference</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="ref" name="ref" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer ref END-->
                                        </div>
                                        <!--Row 2 end-->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php include("../includes/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($status==true)) {
        echo "<script>location.href='http://localhost/pos/hardware/lists/index.php';</script>";
    }
    include("../includes/scripts-list.php"); mysqli_close($conn);
    ?>
</body>
</html>
<!-- end document-->