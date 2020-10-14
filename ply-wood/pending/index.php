<?php include("../includes/db-connection.php"); ?>
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
                            <?php
                            if(!empty($_GET["page"])){
                                if($_GET["page"]==1){
                                    include("they-pay.php");
                                }
                                else if($_GET["page"]==2){
                                    include("you-pay.php");
                                }
                                else if($_GET["page"]==3){
                                    include("customer-pay.php");
                                }
                            }
                            ?>
                        </div>

                        <?php 
                        include("../includes/footer.php"); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/scripts-list.php"); mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->
