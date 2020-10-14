<?php
$sql = 'SELECT * FROM categories WHERE `parent_id`=0';
$result = mysqli_query($conn,$sql);
?>
<!--All Categories Start-->
    <div class="content mt-3 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">All Categories</strong>
                <a href="add_cat.php" class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom:25px;">
                <i class="zmdi zmdi-plus"></i>Add Category</a>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Items</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql2 = 'SELECT `id`,`name` FROM categories WHERE `parent_id`=' . $row["id"];
                            $result2 = mysqli_query($conn,$sql2);

                            $sql3 = 'SELECT COUNT(id) FROM products WHERE `category`=' . $row["id"];
                            $result3 = mysqli_query($conn,$sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                $row3 = mysqli_fetch_assoc($result3);
                                $items = $row3["COUNT(id)"];
                            }
                            else{
                                $items = 0;
                            }
                        ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $items; ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="edit_cat.php?id=<?php echo $row['id']; ?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" title="Delete" onclick="del_cat(<?php echo $row['id']; ?>);">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $sql4 = 'SELECT COUNT(id) FROM products WHERE `sub_category`=' . $row2["id"];
                                $result4 = mysqli_query($conn,$sql4);
                                if (mysqli_num_rows($result4) > 0) {
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $items = $row4["COUNT(id)"];
                                }
                                else{
                                    $items = 0;
                                }
                        ?>
                        <tr>  
                            <td style="padding-left: 120px;"><?php echo $row2["name"]; ?></td>
                            <td><?php echo $items; ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="edit_cat.php?id=<?php echo $row2['id']; ?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" title="Delete" onclick="del_cat(<?php echo $row2['id']; ?>);">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } } } ?>
                    </tbody>
                </table>
                <?php } else { echo "No Products Available !";} ?>
            </div>
        </div>
    </div>
<!--All Categories END-->