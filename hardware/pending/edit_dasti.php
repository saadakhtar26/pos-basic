<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../includes/head.php"); ?>
</head>

<body>
    <?php
    include("../includes/db-connection.php");
    if (($_SERVER["REQUEST_METHOD"]=="GET") && (!empty($_GET["id"])) ) {
        $sql = 'SELECT * FROM dasti_khata WHERE id=' . $_GET["id"] . " AND `amount`>0";
        $result = mysqli_query($conn,$sql);
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
                                    <strong>Edit</strong> <?php if ($row["they_pay"]==1) { echo "They"; } else{ echo "You"; }  ?> Pay
                                </div>
                                <div class="card-body card-block">
                                    <form action="edit_dasti.php" method="post">
                                        <!--Hidden ID input-->
                                        <input type="number" style="display: none;" name="id" id="id" value="<?php echo $_GET["id"]; ?>">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" value="<?php echo $row["person_name"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--Name END-->

                                            <!--discription Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Discription</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="discription" name="discription" value="<?php echo $row["disc"]; ?>" class="form-control">
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
                                                    <label for="text-input" class=" form-control-label">Due Date</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="date" min="<?php echo $row["due_date"]; ?>" id="due_date" name="due_date" value="<?php echo $row["due_date"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--due date END-->

                                            <!--amount Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Amount</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" id="amount" name="amount" value="<?php echo $row["amount"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--amount END-->
                                        </div>
                                        <!--Row 2 end-->
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
    <?php }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sql2 = "UPDATE `dasti_khata` SET `disc`='" . $_POST["discription"]  . "', `person_name`='" . $_POST["name"] . "', `due_date`='" . $_POST["due_date"] . "', `amount`='" . $_POST["amount"] . "' WHERE `id`=" . $_POST["id"];
        mysqli_query($conn,$sql2);
        $staus = true;
    }
    include("../includes/scripts-list.php");
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($staus==true)) {
        echo "<script>location.href='http://localhost/pos/hardware/pending/index.php?id=1';</script>";
    } mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->