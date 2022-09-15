<?php

//Actually Today
$today = date("Y-m-d");

//Daily Deposit 
$sql = "SELECT SUM(received) FROM `invoice` WHERE `date` ='" . $today . "'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $today_sale = $row["SUM(received)"];
}
else{
    $today_sale = 0;
}


//Monthly Deposit
$month = date("-m-");
$sql2 = "SELECT SUM(received) FROM `invoice` WHERE `date` LIKE '%" . $month . "%'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
    $row2 = mysqli_fetch_assoc($result2);
    $month_sale = $row2["SUM(received)"];
}
else{
    $month_sale = 0;
}


//yearly deposit
$year = date("Y-");
$sql3 = "SELECT SUM(received) FROM `invoice` WHERE `date` LIKE '" . $year . "%'";
$result3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($result3)>0){
    $row3 = mysqli_fetch_assoc($result3);
    $yearly_deposit = $row3["SUM(received)"];
}
else{
    $yearly_deposit = 0;
}


//pending customer
$sql4 = "SELECT SUM(pending) FROM `invoice` WHERE `pending_status`=1";
$result4 = mysqli_query($conn,$sql4);
if(mysqli_num_rows($result4)>0){
    $row4 = mysqli_fetch_assoc($result4);
    $pending_cust = $row4["SUM(pending)"];
}
else{
    $pending_cust = 0;
}

//pending shop
$sql5 = "SELECT SUM(amount) FROM `dasti_khata` WHERE `they_pay`=1 AND `status`=1";
$result5 = mysqli_query($conn,$sql5);
if(mysqli_num_rows($result5)>0){
    $row5 = mysqli_fetch_assoc($result5);
    $pending_shop = $row5["SUM(amount)"];
}
else{
    $pending_shop = 0;
}

//Total Pending
$pending = $pending_shop + $pending_cust;


?> 
<!--All Widgets Start-->
<div class="row m-t-25">
    <!--First Widget-->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2><?php echo intval($today_sale); ?></h2>
                        <span>Today Sale</span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!--Second Widget-->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2><?php echo intval($month_sale); ?></h2>
                        <span><?php echo date("F", strtotime('this month')); ?> Sale</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Third Widget-->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2><?php echo intval($yearly_deposit); ?></h2>
                        <span><?php echo date("Y"); ?> Sale</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fourth Widget-->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2><?php echo intval($pending); ?></h2>
                        <span>Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--All Widgets END-->