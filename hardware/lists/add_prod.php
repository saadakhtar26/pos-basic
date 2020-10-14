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
                                    <strong>Add</strong> Product
                                </div>
                                <div class="card-body card-block">
                                    <form action="add_prod.php" method="post">
                                       <!--Start row 1-->
                                        <div class="row">
                                            <!--Product Barcode Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Barcode</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="bar_code" name="bar_code" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Discription END-->

                                            <!--Product Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--Product Name END-->
                                        </div>
                                        <!--End Row 1-->

                                        <!--Row 2 Start-->
                                        <div class="row">
                                            <!--Product Discription Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Discription</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="disc" name="disc" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Discription END-->

                                            <!--Product Company Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Company</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="company" name="company" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Company END-->
                                        </div>
                                        <!--Row 2 end-->

                                        <!--Row 3 Start-->
                                        <div class="row">
                                            <!--Product Quantity Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Remaining</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" id="remaining" name="remaining" class="form-control" required >
                                                </div>
                                            </div>
                                            <!--Product Quantity END-->

                                            <!--Product Buy Price Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label" >Purchase</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" id="puchase" name="purchase" class="form-control" required >
                                                </div>
                                            </div>
                                            <!--Product Buy Price END-->
                                        </div>
                                        <!--Row 3 End-->
                                        
                                        <!--Row 4 start-->
                                        <div class="row">

                                        <!--Product Rate Start-->
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4">
                                                <label for="text-input" class=" form-control-label" >Price</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" id="rate" name="rate" class="form-control" required >
                                            </div>
                                        </div>
                                        <!--Product Rate END-->

                                        <!--Category Select Start-->
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4">
                                                <label for="select" class=" form-control-label">Category</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="category" id="category" class="form-control" required>
                                                    <option selected disabled>None</option>
                                                    <?php
                                                    $sql = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=0';
                                                    $result = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                            <option onclick="cat_sel(<?php echo $row['id']; ?>);" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--Category Select END-->

                                        <!--Sub-Category Select Start-->
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4">
                                                <label for="select" class=" form-control-label">Sub Category</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="sub_category" id="sub_category" class="form-control">
                                                    <option value="0" selected>Select Option</option>

                                                    <?php
                                                    //main category query
                                                    $sql2 = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=0';
                                                    $result2 = mysqli_query($conn,$sql2);
                                                    if (mysqli_num_rows($result2) > 0) {
                                                        //loop through main categories
                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            //sub category query for current main category
                                                            $sql3 = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=' . $row2["id"];
                                                            $result3 = mysqli_query($conn,$sql3);
                                                            if (mysqli_num_rows($result3) > 0) { ?>
                                                                <optgroup id="<?php echo $row2["id"]; ?>" style="display:none;" label="<?php echo $row2["name"]; ?>">
                                                            <?php
                                                                //loop through sub categories
                                                                while($row3 = mysqli_fetch_assoc($result3)){
                                                                    ?>
                                                                    <option value="<?php echo $row3["id"]; ?>"><?php echo $row3["name"]; ?></option>
                                                                    <?php
                                                                }
                                                                echo "</optgroup>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--Sub-Category Select END-->
                                        </div>
                                        <!--Row 4 end-->
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Add
                                    </button>
                                </div>
                                </form>
                            </div>
                            <?php
                            if($_SERVER["REQUEST_METHOD"]=="POST"){
                                $sql4 = "INSERT INTO `products`(`id`,`name`,`bar_code`,`company`,`discription`,`category`,`sub_category`,`buy_price`,`rate`,`stock_quantity`) VALUES(NULL, '" . $_POST["name"]  . "', '" . $_POST["bar_code"] . "', '" . $_POST["company"] . "', '" . $_POST["disc"] . "', " . $_POST["category"] . ", " . $_POST["sub_category"] . ", " . $_POST["purchase"] . ", " . $_POST["rate"] . ", " . $_POST["remaining"] . ")";
                                mysqli_query($conn,$sql4);
                                $status = true;
                            }
                            ?>
                        </div>
                        <?php include("../includes/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/scripts-list.php"); ?>
    <script>
        function cat_sel(id){
            let optgroups = document.getElementsByTagName("optgroup");
            let i=0;
            while(i<optgroups.length){
                optgroups[i].style.display = 'none';
                i++;
            }
            document.getElementById(id).style.display='block';
        }
    </script>
    <?php if (($_SERVER["REQUEST_METHOD"]=="POST") && ($status==true)) {
        echo "<script>location.href='http://localhost/pos/hardware/lists/index.php';</script>";
    } mysqli_close($conn); ?>
</body>
</html>
<!-- end document-->