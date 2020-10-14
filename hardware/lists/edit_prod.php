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
                            <?php
                            if ($_SERVER["REQUEST_METHOD"]=="GET") {
                                if (!empty($_GET["id"])) {
                                    $sql = 'SELECT * FROM products WHERE id=' . $_GET["id"];
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="card col-md-12">
                                <div class="card-header">
                                    <strong>Edit</strong> Product
                                </div>
                                <div class="card-body card-block">
                                    <form action="edit_prod.php" method="post">
                                        <!--Hidden ID input-->
                                        <input type="number" style="display: none;" name="id" id="id" value="<?php echo $_GET["id"]; ?>">

                                        <!--Start row 1-->
                                        <div class="row">
                                            <!--Product Barcode Start-->
                                            <div class="form-group col-md-6 col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Barcode</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="bar_code" name="bar_code" value="<?php echo $row["bar_code"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Discription END-->

                                            <!--Product Name Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" class="form-control">
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
                                                    <input type="text" id="disc" name="disc" value="<?php echo $row["discription"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Discription END-->

                                            <!--Product Company Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Company</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="company" name="company" value="<?php echo $row["company"]; ?>" class="form-control">
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
                                                    <input type="number" id="remaining" name="remaining" value="<?php echo $row["stock_quantity"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Quantity END-->

                                            <!--Product Purchase Start-->
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4">
                                                    <label for="text-input" class=" form-control-label">Purchase</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" value="<?php echo $row["buy_price"]; ?>" id="purchase" name="purchase" class="form-control">
                                                </div>
                                            </div>
                                            <!--Product Purchase END-->
                                            
                                        </div>
                                        <!--Row 3 End-->
                                        
                                        <!--Row 4 start-->
                                        <div class="row">

                                        <!--Product Rate Start-->
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4">
                                                <label for="text-input" class=" form-control-label">Price</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" value="<?php echo $row["rate"]; ?>" id="rate" name="rate" class="form-control">
                                            </div>
                                        </div>
                                        <!--Product Quantity END-->

                                        <!--Category Select Start-->
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4">
                                                <label for="select" class=" form-control-label">Category</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="category" id="category" class="form-control">
                                                    <option value="0">Select Option</option>
                                                    <?php
                                                    $sql2 = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=0';
                                                    $result2 = mysqli_query($conn,$sql2);
                                                    if (mysqli_num_rows($result2) > 0) {
                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            ?>
                                                            <option <?php if($row["category"]==$row2["id"]){echo "selected";} ?> onclick="cat_sel(<?php echo $row2['id']; ?>);" value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
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
                                                    <option value="0">Select Option</option>

                                                    <?php
                                                    //main category query
                                                    $sql3 = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=0';
                                                    $result3 = mysqli_query($conn,$sql3);
                                                    if (mysqli_num_rows($result3) > 0) {
                                                        //loop through main categories
                                                        while($row3 = mysqli_fetch_assoc($result3)){
                                                            //sub category query for current main category
                                                            $sql4 = 'SELECT `id`,`name` FROM `categories` WHERE `parent_id`=' . $row3["id"];
                                                            $result4 = mysqli_query($conn,$sql4);
                                                            if (mysqli_num_rows($result4) > 0) { ?>
                                                                <optgroup id="<?php echo $row3["id"]; ?>"<?php if($row["category"]!=$row3["id"]){echo ' style="display:none;"';} ?> label="<?php echo $row3["name"]; ?>">
                                                            <?php
                                                                //loop through sub categories
                                                                while($row4 = mysqli_fetch_assoc($result4)){
                                                                    ?>
                                                                    
                                                                    <option <?php if($row["sub_category"]==$row4["id"]){echo "selected";} ?> value="<?php echo $row4["id"]; ?>"><?php echo $row4["name"]; ?></option>
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
                                        <i class="fa fa-dot-circle-o"></i> Edit
                                    </button>
                                </div>
                                </form>
                            </div>
                            <?php } } 
                            }
                            else if($_SERVER["REQUEST_METHOD"]=="POST"){
                                $sql2 = "UPDATE `products` SET `bar_code`='" . $_POST["bar_code"]  . "', `name`='" . $_POST["name"] . "', `discription`='" . $_POST["disc"] . "', `company`='" . $_POST["company"] . "', `stock_quantity`=" . $_POST["remaining"] . ", `buy_price`=" . $_POST["purchase"] . ", `rate`=" . $_POST["rate"] . ", `category`=" . $_POST["category"] . ", `sub_category`=" . $_POST["sub_category"] . " WHERE `id`=" . $_POST["id"];
                                mysqli_query($conn,$sql2);
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