<?php
include("../includes/db-connection.php");
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
                            <?php include("all-products.php"); ?>
                        </div>

                        <div class="row">
                            <?php include("all-customers.php"); ?>
                        </div>
                        <div class="row">
                            <?php include("all-categories.php"); ?>
                        </div>

                        <?php 
                        include("../includes/footer.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/scripts.php"); ?>
    <script>
        function del_prod(id){
            var result = confirm("Are you Sure ?");
            if (result){
                window.location.replace("lists/del_prod.php?id="+id);
            }
        }
        function del_cust(id){
            var result = confirm("Are you Sure ?");
            if (result){
                window.location.replace("lists/del_cust.php?id="+id);
            }
        }
        function del_cat(id){
            var result = confirm("Are you Sure ?");
            if (result){
                window.location.replace("lists/del_cat.php?id="+id);
            }
        } mysqli_close($conn);
    </script>
</body>
</html>
<!-- end document-->
