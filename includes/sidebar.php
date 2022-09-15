<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" style="width:200px;">
    <div class="logo">
        <a href="index.php">
            Point of Sale
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="<?php if( $_SERVER["PHP_SELF"]=="/pos/index.php" ){echo 'active';}?>">
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li <?php if(strpos($_SERVER["PHP_SELF"], "lists")){echo 'class="active"';}?>>
                    <a href="lists/index.php">
                        <i class="fas fa-table"></i>Lists</a> 
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "invoice")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-check-square"></i>Invoice</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="invoice.php">
                                <i class="fas fa-table"></i>List</a>
                        </li>
                        <li><a href="invoice_history.php"><i class="fas fa-history"></i>History</a></li>
                    </ul>
                </li>
                <li <?php if(strpos($_SERVER["PHP_SELF"], "sale")){echo 'class="active"';}?>>
                    <a href="shop/sale.php">
                        <i class="fas fa-cart-plus"></i>Sale</a>
                </li>

                <?php
                include("db-connection.php");
                $today = date("Y-m-d");
                $sql5 = "SELECT COUNT(amount) FROM `dasti_khata` WHERE `amount`>0 AND `status`=1 AND `due_date`='" . $today . "'";
                $result5 = mysqli_query($conn,$sql5);
                $row5 = mysqli_fetch_assoc($result5);
                $count = $row5["COUNT(amount)"];
                ?>
                
                <li <?php if(strpos($_SERVER["PHP_SELF"], "notification")){echo 'class="active"';}?>>
                    <a href="notification.php" style="display:inline-block;">
                        <i class="fas fa-exclamation-triangle"></i>Notification</a>
                        <span style="color:red;font-weight:800;font-size:1.75em;">
                            <?php if($count>0){
                                echo $count;
                            }?>
                        </span>
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "pending")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Pending</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="pending/index.php?page=1">We Get</a>
                        </li>
                        <li>
                            <a href="pending/index.php?page=2">We Pay</a>
                        </li>
                        <li>
                            <a href="pending/index.php?page=3">Customer</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if(strpos($_SERVER["PHP_SELF"], "history")){echo ' active';}?>">
                    <a href="history.php">
                    <i class="fas fa-history"></i>History</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->