<?php
include("includes/db-connection.php");
?>
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
                        <a href="http://localhost/pos/index.php" style="color: #333; text-decoration:underline;"><i>back</i></a>
                        <?php
                        include("index-parts/widgets.php");
                        include("index-parts/summary-tables.php");
                        include("includes/footer.php");
                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include("includes/scripts-list.php"); mysqli_close($conn); ?>

</body>
</html>
<!-- end document-->
