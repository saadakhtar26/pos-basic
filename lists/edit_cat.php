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
                                    <strong>Edit</strong> Category
                                </div>
                                <div class="card-body card-block">
                                    <form action="lists/edit_cat.php" method="post">
                                    
                                    <?php
                                    if (($_SERVER["REQUEST_METHOD"]=="GET") && (!empty($_GET["id"]))) {
                                        $id = $conn->real_escape_string($_GET["id"]);
                                        $sql = "SELECT * FROM categories WHERE id=" . $id;
                                        $result = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_assoc($result);
                                    ?>

                                        <!--Hidden ID input-->
                                        <input type="number" style="display: none;" name="id" id="id" value="<?php echo $id; ?>">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--Category Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--Category Name END-->
                                        </div>
                                        <!--End Row 1-->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
                                        </button>
                                    </div>
                                    <?php 
                                    }
                                    else if($_SERVER["REQUEST_METHOD"]=="POST"){
                                        $sql2 = "UPDATE `categories` SET `name`='" . $_POST["name"] . "' WHERE `id`=" . $_POST["id"];
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