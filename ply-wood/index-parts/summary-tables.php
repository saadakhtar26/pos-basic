<?php
$sql = 'SELECT `name`,`stock_quantity` FROM `products` WHERE `stock_quantity` < 15';
$result = mysqli_query($conn,$sql);
?>
<!--Index Tables Start-->
<div class="row">
    <!--Stock Items-->
    <div class="col-lg-4">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Low in Stock</h3>
            <div class="table-responsive">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-top-campaign">
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["stock_quantity"]; ?> items</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else{ echo "No Products";} ?>
            </div>
        </div>
    </div>
    <!--Stock Items End-->

    <!--DB Backup-->
    <a href="http://localhost/phpmyadmin/db_export.php?db=ply_wood" target="_blank" class="col-sm-6 col-lg-3 backup">
        Backup Database
    </a>
    <!--DB Backup-->
</div>