<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="http://localhost/pos/index.php">
                    <img src="http://localhost/pos/assets/images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="http://localhost/pos/index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="http://localhost/pos/lists/index.php">
                        <i class="fas fa-table"></i>Lists</a>
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "invoice")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-check-square"></i>Invoice</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="http://localhost/pos/invoice.php">
                                <i class="far fa-table"></i>List</a>
                        </li>
                        <li><a href="http://localhost/pos/invoice_history.php"><li class="fas fa-history"></li>History</a></li>
                    </ul>
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "pending")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Pending</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="http://localhost/pos/pending/they-pay.php">Someone Pay (Kisi ne)</a>
                        </li>
                        <li>
                            <a href="http://localhost/pos/pending/you-pay.php">We Pay (Hum ne)</a>
                        </li>
                        <li>
                            <a href="http://localhost/pos/pending/customer-pay.php">Customer Pay</a>
                        </li>
                    </ul>
                </li>
                <li><a href="http://localhost/pos/history.php"><li class="fas fa-history"></li>History</a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="http://localhost/pos/ply-wood/index.php">
            Ply Wood
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="<?php if( $_SERVER["PHP_SELF"]=="/pos/index.php" ){echo 'active';}?>">
                    <a href="http://localhost/pos/ply-wood/index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li <?php if(strpos($_SERVER["PHP_SELF"], "lists")){echo 'class="active"';}?>>
                    <a href="http://localhost/pos/ply-wood/lists/index.php">
                        <i class="fas fa-table"></i>Lists</a> 
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "invoice")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-check-square"></i>Invoice</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="http://localhost/pos/ply-wood/invoice.php">
                                <i class="fas fa-table"></i>List</a>
                        </li>
                        <li><a href="http://localhost/pos/ply-wood/invoice_history.php"><i class="fas fa-history"></i>History</a></li>
                    </ul>
                </li>
                <li <?php if(strpos($_SERVER["PHP_SELF"], "sale")){echo 'class="active"';}?>>
                    <a href="http://localhost/pos/ply-wood/1/sale.php">
                        <i class="fas fa-cart-plus"></i>Sale</a>
                </li>
                <li <?php if(strpos($_SERVER["PHP_SELF"], "notification")){echo 'class="active"';}?>>
                    <a href="http://localhost/pos/ply-wood/notification.php">
                        <i class="fas fa-exclamation-triangle"></i>Notification</a>
                </li>
                <li class="has-sub<?php if(strpos($_SERVER["PHP_SELF"], "pending")){echo ' active';}?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Pending</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="http://localhost/pos/ply-wood/pending/index.php?page=1">Someone Pay (Kisi ne)</a>
                        </li>
                        <li>
                            <a href="http://localhost/pos/ply-wood/pending/index.php?page=2">We Pay (Hum ne)</a>
                        </li>
                        <li>
                            <a href="http://localhost/pos/ply-wood/pending/index.php?page=3">Customer</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if(strpos($_SERVER["PHP_SELF"], "history")){echo ' active';}?>">
                    <a href="http://localhost/pos/ply-wood/history.php">
                    <i class="fas fa-history"></i>History</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->