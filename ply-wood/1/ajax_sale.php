<?php 

//pos/ply-wood/1/ajax_sale.php

include("config.php");

for ($i=0; $i<(count($_POST['bar_code'])); $i++) {
	$product_id = $_POST["product_id"][$i];
	
	$sql_prod_quantity = "SELECT `stock_quantity`,`sale_count` FROM  `products` WHERE `id`=" . $product_id;
	$result = mysqli_query($conn,$sql_prod_quantity);
	$row = mysqli_fetch_assoc($result);
	 
	$total_stock = $row["stock_quantity"];
	$debit_stock = $_POST["quantity"][$i];
	$new_quantity = $total_stock - $debit_stock;

	$total_sale = $row["sale_count"];
	$debit_sale = $_POST["quantity"][$i];
	$new_sale = $total_sale + $debit_sale;

	$sql_new_quantity = "UPDATE `products` SET `stock_quantity`=" . $new_quantity . ", `sale_count`=" . $new_sale . " WHERE `id`=" . $_POST["product_id"][$i];
	mysqli_query($conn,$sql_new_quantity);
}


if(isset($_POST['bar_code']) AND !empty($_POST['bar_code'])){

	if($_POST["received"]==''){$received = $_POST["total"];}else{$received = $_POST["received"];}
	if($_POST["pending"]==''){$pending = 0;}else{$pending = $_POST["pending"];}

	$sql = "INSERT INTO `invoice`(`id`,`time`,`date`,`total`,`received`,`pending`,`due_date`,`cust_id`,`chain_id`,`pending_status`) VALUES(NULL, CURRENT_TIME, CURRENT_DATE, " . $_POST["total"] . ", " . $received . ", " . $pending . ", ";
	
	if($_POST["due_date"]==''){$sql .= "'', ";}
	else{$sql .= "'" . $_POST["due_date"] . "', ";}

	if($_POST["pending"]==0){
		$pending_status = 0;
	}
	else{
		$pending_status = 1;
	}

	if($_POST["cust_id"]==(-1)){
		//run query and get cust_id
		$query = "INSERT INTO `customer`(`id`,`name`,`contact`,`address`,`ref`,`reg_date`) VALUES(NULL, '" . $_POST["cust_name"] . "', '', '', '', CURRENT_DATE)";
		mysqli_query($conn,$query);
		$sql .= mysqli_insert_id($conn) . ", 0, " . $pending_status .")";
	}
	else{$sql .= $_POST["cust_id"] . ", 0, " . $pending_status . ")";}
	mysqli_query($conn,$sql);

	echo $last_invoice = mysqli_insert_id($conn);

	for ($i=0; $i<(count($_POST['bar_code'])); $i++) {
		if ($_POST["discount"][$i]=="") {$discount = 0;}
		else { $discount = $_POST["discount"][$i]; }
		$name = $_POST['name'][$i];
		$rate = $_POST['mrp'][$i];
		$quantity = $_POST['quantity'][$i];
		$total = $_POST['sale_price'][$i];

		$sql_insert = "INSERT INTO `invoice_details`(`id`,`invoice_id`,`name`,`rate`,`quantity`,`discount`,`total`) VALUES(NULL, ".$last_invoice.", '".$name."', ".$rate.", ".$quantity.", ".$discount.", ".$total.")";
		mysqli_query($conn,$sql_insert);
	}
}
?>