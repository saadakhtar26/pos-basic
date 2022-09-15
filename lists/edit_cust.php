<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../includes/head.php"); ?>
</head>

<body>
    <?php
    include("../includes/db-connection.php");
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        if (!empty($_GET["id"])) {
            $id = $conn->real_escape_string($_GET["id"]);
            $sql = 'SELECT * FROM customer WHERE id=' . $id;
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
    ?>
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
                                    <strong>Edit</strong> Customer
                                </div>
                                <div class="card-body card-block">
                                    <form action="lists/edit_cust.php" method="post">
                                        <!--Hidden ID input-->
                                        <input type="number" style="display: none;" name="id" id="id" value="<?php echo $id; ?>">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--customer Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer Name END-->

                                            <!--customer Contact Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Contact</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="contact" name="contact" value="<?php echo $row["contact"]; ?>" class="form-control">
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
                                                    <input type="text" id="address" name="address" value="<?php echo $row["address"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer address END-->

                                            <!--customer ref Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Reference</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="ref" name="ref" value="<?php echo $row["ref"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer ref END-->
                                        </div>
                                        <!--Row 2 end-->

                                        <!--Row 3 Start-->
                                        <div class="row">
                                            <!--customer reg date Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Registeration</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="date" value="<?php echo $row["reg_date"]; ?>" id="reg_date" name="reg_date" class="form-control">
                                                </div>
                                            </div>
                                            <!--customer reg date END-->
                                        </div>
                                        <!--Row 3 End-->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
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
    <?php } } }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sql2 = "UPDATE `customer` SET `contact`='" . $_POST["contact"]  . "', `name`='" . $_POST["name"] . "', `address`='" . $_POST["address"] . "', `ref`='" . $_POST["ref"] . "', `reg_date`='" . $_POST["reg_date"] . "' WHERE `id`=" . $_POST["id"];
        mysqli_query($conn,$sql2);
        $staus = true;
    }
    include("../includes/scripts.php");
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($staus==true)) {
        echo "<script>location.href='lists/index.php';</script>";
    } mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->