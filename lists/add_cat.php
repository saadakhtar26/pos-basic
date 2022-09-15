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
                        <?php
                        include("../includes/db-connection.php");
                        ?>
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="card-header">
                                    <strong>Add</strong> Category
                                </div>
                                <div class="card-body card-block">
                                    <form action="lists/add_cat.php" method="post">
                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--Category Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--Category Name END-->

                                            <!--Category Select Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="select" class=" form-control-label">Parent</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="parent" id="parent" class="form-control">
                                                        <option value="0" selected>None</option>
                                                        <?php
                                                        $sql = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=0';
                                                        $result = mysqli_query($conn,$sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--Category Select END-->
                                        </div>
                                        <!--End Row 1-->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                    </div>
                                    <?php 
                                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                                        $sql2 = "INSERT INTO `categories`(`id`,`parent_id`,`name`) VALUES(NULL, " . $_POST["parent"] .", '" . $_POST["name"] ."')";
                                        mysqli_query($conn,$sql2);
                                        $status = true;
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                        <?php include("../includes/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/scripts.php");
    if (($_SERVER["REQUEST_METHOD"]=="POST") && ($status==true)) {
        echo "<script>location.href='lists/index.php';</script>";
    } mysqli_close($conn);
    ?>
</body>
</html>
<!-- end document-->