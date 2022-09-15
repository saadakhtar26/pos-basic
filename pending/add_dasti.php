<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../includes/head.php"); ?>
</head>

<body>
    <?php include("../includes/db-connection.php"); ?>
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
                                    <strong>Add</strong> Dasti Khata
                                </div>
                                <div class="card-body card-block">
                                    <form action="pending/add_dasti.php" method="post">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <!--Name END-->

                                            <!--discription Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Discription</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="discription" name="discription" class="form-control">
                                                </div>
                                            </div>
                                            <!--discription END-->
                                        </div>
                                        <!--End Row 1-->

                                        <!--Row 2 Start-->
                                        <div class="row">
                                            <!--due date Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Payment Date</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="date" min="<?php echo date("Y-m-d"); ?>" id="due_date" name="due_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--due date END-->

                                            <!--amount Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Amount</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" id="amount" name="amount" value="0" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--amount END-->
                                        </div> 
                                        <!--Row 2 end-->
                                        <input type="hidden" name="they_pay" id="they_pay" value='<?php echo $_GET["page"]; ?>' />
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
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sql = "INSERT INTO `dasti_khata`(`id`,`they_pay`,`amount`,`date_taken`,`due_date`,`person_name`,`status`,`disc`) VALUES(NULL, " . $_POST["they_pay"] .", " . $_POST["amount"]  . ", CURRENT_DATE, '" . $_POST["due_date"] . "', '" . $_POST["name"] . "', 1, '" . $_POST["discription"] . "')";
        mysqli_query($conn,$sql);
        $staus = true;
    }
    include("../includes/scripts.php");
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($staus==true)) {
        echo "<script>location.href='pending/index.php?page=1';</script>";
    } mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->