<?php

$today = date("Y-m-d",strtotime("-1 day"));

//Daily Deposit
$sql = "SELECT SUM(received) FROM `invoice` WHERE `date` LIKE '%" . $today . "%'";
$result = mysqli_query($conn,$sql);
$received_pending = 0;

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $received_pending += $row["SUM(received)"];
}
else{
    $received_pending = 0;
}


//Monthly Deposit
$month = date("-m-", strtotime(date("Y-m-d").' -1 day'));
$sql2 = "SELECT SUM(received) FROM `invoice` WHERE `date` LIKE '%" . $month . "%'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
    $row2 = mysqli_fetch_assoc($result2);
    $received_pending_monthly = $row2["SUM(received)"];
}
else{
    $received_pending_monthly = 0;
}


//yearly deposit
$year = date("Y-", strtotime(date("Y-m-d").' -1 day'));
$sql3 = "SELECT SUM(received) FROM `invoice` WHERE `date` LIKE '%" . $year . "%'";
$result3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($result3)>0){
    $row3 = mysqli_fetch_assoc($result3);
    $yearly_deposit = $row3["SUM(received)"];
}
else{
    $yearly_deposit = 0;
}


//total deposit

//invoices received total
$sql4 = "SELECT SUM(received) FROM `invoice`";
$result4 = mysqli_query($conn,$sql4);
if(mysqli_num_rows($result4)>0){
    $row4 = mysqli_fetch_assoc($result4);
    $invoices_received = $row4["SUM(received)"];
}
else{
    $invoices_received = 0;
}

//We pay 
$query5 = 'SELECT SUM(amount) FROM `dasti_khata` WHERE `status`=1 AND `they_pay`=0';
$result5 = mysqli_query($conn,$query5);
if(mysqli_num_rows($result5)>0){
    $row5 = mysqli_fetch_assoc($result5);
    $khata_received = $row5["SUM(amount)"];
}
else{
    $khata_received = 0;
}

$deposit = $invoices_received + $khata_received;

//total withdraw
$query6 = 'SELECT SUM(amount) FROM `dasti_khata` WHERE `status`=1 AND `they_pay`=1';
$result6 = mysqli_query($conn,$query6);
if($row6 = mysqli_fetch_assoc($result6)){
    $withdraw = $row6["SUM(amount)"];
}
else{
    $withdraw = 0;
}

/*total = deposit - withdraw
if(!empty($total_received)){$deposit=$total_received;}else{$deposit=0;}
$withdraw = $row13["SUM(amount)"];*/
$total = $deposit - $withdraw;


//if (mysqli_num_rows($result) > 0) {
?> 
<!--All Widgets Start-->
<div class="row m-t-25">
    <!--First Widget-->
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2><?php echo intval($received_pending); ?></h2>
                        <span>Daily Sale</span>
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
                        <h2><?php echo intval($received_pending_monthly); ?></h2>
                        <span>Monthly Sale</span>
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
                        <span>Yearly Sale</span>
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
                        <h2><?php echo intval($total); ?></h2>
                        <span>Balance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--All Widgets END-->