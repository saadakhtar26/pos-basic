<?php
$sql = 'SELECT * FROM products';
$result = mysqli_query($conn,$sql);
?>

<!--All Products Start-->
    <div class="content mt-3 col-md-12"> 
        <div class="card">
            <div class="card-header">
                <strong class="card-title">All Products</strong>
                <a href="add_prod.php" class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom:25px;">
                <i class="zmdi zmdi-plus"></i>Add Product</a>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <table id="bootstrap-data-table-3" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Purchase</th>
                            <th>Rate</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Sales</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sql2 = 'SELECT `name` FROM categories WHERE `id`=' . $row["category"];
                                $result2 = mysqli_query($conn,$sql2);
                                $row2 = mysqli_fetch_assoc($result2);

                                $sql3 = 'SELECT `name` FROM categories WHERE `id`=' . $row["sub_category"];
                                $result3 = mysqli_query($conn,$sql3);
                                $row3 = mysqli_fetch_assoc($result3);
                                if(empty($row3["name"])){$row3["name"]="N/A";}
                        ?>
                        <tr>
                            <td><?php echo $row["bar_code"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["buy_price"]; ?></td>
                            <td><?php echo $row["rate"]; ?></td>
                            <td><?php echo $row["stock_quantity"]; ?></td>
                            <td><?php echo $row2["name"]; ?></td>
                            <td><?php echo $row3["name"]; ?></td>
                            <td><?php echo $row["sale_count"]; ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="edit_prod.php?id=<?php echo $row['id']; ?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" title="Delete" onclick="del_prod(<?php echo $row['id']; ?>);">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { echo "No Products Available !";} ?>
            </div>
        </div>
    </div>
<!--All Products END-->