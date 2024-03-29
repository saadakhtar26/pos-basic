<?php
include("includes/db-connection.php");
?>
<!DOCTYPE html>
<html lang="en">

    <?php include("includes/head.php") ?>

<body>
    <div>
        <?php include("includes/sidebar.php"); ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php
                        include("widgets.php");
                        include("summary.php");
                        include("includes/footer.php");
                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php
    include("includes/scripts.php");
    mysqli_close($conn);
    ?>

</body>
</html>
<!-- end document-->
