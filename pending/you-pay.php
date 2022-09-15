<?php
$sql = 'SELECT * FROM `dasti_khata` WHERE `they_pay`=0 AND `amount`>0 AND `status`=1';
$result = mysqli_query($conn,$sql);
?>
<!--Start You Pay Table-->
<div class="col-lg-12">
    <div class="top-campaign">
        <h3 class="title-3 m-b-30">We Pay</h3>
        <a href="add_dasti.php?page=0" class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom:25px;">
        <i class="zmdi zmdi-plus"></i>Add We Pay</a>
        <div class="table-responsive">
            <?php if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-top-campaign">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Payment Date</th>
                        <th>Due Amount</th>
                        <th>Edit</th>
                        <th>Set Paid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["person_name"]; ?></td>
                        <td><?php echo $row["disc"]; ?></td>
                        <td><?php echo $row["due_date"]; ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="edit_dasti.php?id=<?php echo $row["id"]; ?>" class="item" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="paid.php?id=<?php echo $row["id"]; ?>" class="item" title="Paid">
                                    <i class="zmdi zmdi-check"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else {echo "<br><span>No Pending Payments</span>";} ?>
    </div>
</div>
<!--END You Pay Table-->