<?php
$sql = 'SELECT * FROM customer';
$result = mysqli_query($conn,$sql); 
?>
<!--All Customers Start-->
    <div class="content mt-3 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">All Customers</strong>
                <a href="add_cust.php" class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom:25px;">
                <i class="zmdi zmdi-plus"></i>Add Customer</a>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <table id="bootstrap-data-table-2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Reference</th>
                            <th>Registeration</th>
                            <th>Purchase</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row["ref"]; ?></td> 
                            <td><?php echo $row["reg_date"]; ?></td>
                            <?php
                                $query = "SELECT SUM(total) AS purchase FROM invoice WHERE cust_id=".$row["id"];
                                $result2 = mysqli_query($conn,$query);
                                $row2 = mysqli_fetch_assoc($result2);
                                if($row2["purchase"]==NULL){$row2["purchase"]='0.00';}
                            ?>
                            <td><a href="http://localhost/pos/ply-wood/purchase_history.php?id=<?php echo $row['id']; ?>"><?php echo $row2["purchase"]; ?></a></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="edit_cust.php?id=<?php echo $row['id']; ?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" title="Delete" onclick="del_cust(<?php echo $row['id']; ?>);">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { echo "No Customers Available !";} ?>
            </div>
        </div>
    </div>
<!--All Customers END-->