<?php 
include('config.php');
@extract($_REQUEST);
if(!empty($_POST['action_type'])){
	$action_type = $conn->real_escape_string($_POST['action_type']);
	switch($action_type){
		case "remove":
		if(!empty($_POST['id'])){
			$id = $conn->real_escape_string($_POST['id']);
			$sql = "DELETE FROM product WHERE id = '$id'";
			if($conn->query($sql)){
				echo "Product Has Been Deleted Successfully !";
			}else{
				echo "Something Went Wrong !";
			}
		}
		break;
		
		case "get_detail":
		if(!empty($_POST['bar_code'])){
			$bar_code = $_POST['bar_code'];
			$sql = mysqli_query($conn,"SELECT * FROM products WHERE bar_code = '$bar_code'");
			$numRow = mysqli_num_rows($sql);
			if($numRow > 0){
				$row = mysqli_fetch_assoc($sql);
				$detail = array('type'=>'Success','product_id'=>$row['id'],'bar_code'=>$row['bar_code'],'name'=>$row['name'],'purchase'=>$row['buy_price'],'mrp'=>$row['rate'],'stock'=>$row['stock_quantity'],'sale_price'=>$row['rate'],'av_quantity'=>$row['stock_quantity']);
				echo json_encode($detail);
			}else{
				$detail = array('type'=>'Error');
				echo json_encode($detail);
			}
		}
		break;

		case "get_detail_by_name":
		if(!empty($_POST['name'])){
			$name = mysqli_real_escape_string($conn,$_POST['name']);
			$sql = mysqli_query($conn,"SELECT * FROM products WHERE `name`='" . $name ."'");
			$numRow = mysqli_num_rows($sql);
			if($numRow > 0){
				$row = mysqli_fetch_assoc($sql);
				$detail = array('type'=>'Success','product_id'=>$row["id"],'bar_code'=>$row['bar_code'],'purchase'=>$row['buy_price'],'mrp'=>$row['rate'],'stock'=>$row['stock_quantity'],'sale_price'=>$row['rate'],'av_quantity'=>$row['stock_quantity']);
				echo json_encode($detail);
			}else{
				$detail = array('type'=>'Error');
				echo json_encode($detail);
			}
			
		}
		break;
	}
}
?>