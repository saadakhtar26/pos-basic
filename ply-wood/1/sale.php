<?php 

//pos/ply-wood/1/sale.php

include("config.php");
include("head.php");
//New invoice ID
$last_bill_no = mysqli_query($conn,"SELECT MAX(id + 1) AS bill_no FROM invoice");
$bill_no = mysqli_fetch_assoc($last_bill_no);
$invoice_id = $bill_no['bill_no']; ?>

<body onload="default_focus()">
  <!-- Page -->
  <div class="page" style="margin-left: 20px; margin-right: 20px;">

    <div class="page-header">
      <h1 class="page-title">Billing</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/pos/ply-wood/index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Billing</li>
      </ol>
    </div>

    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
			  <form class="form-horizontal00 billingForm" action="ajax_sale.php" method="POST" name="billingForm" id="dd" autocomplete="off">
				<input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $invoice_id;?>" />
				
				<!--Products table Start-->
				<table id="app">
					<thead>
						<th style="min-width:140px;">Barcode</th>
						<th>Name</th>
						<th>Purchase</th>
						<th>Rate</th>
						<th>Stock</th>
						<th>Quantity</th>
						<th>Disc %age</th>
						<th>Sale Price</th>
					</thead>
					<tbody>
					<tr id="1">
						<input type="hidden" id="product_id_1" name="product_id[]" />
						<td>
							<input type="text" id="bar_code_1" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,1)" name="bar_code[]" />
						</td>
						<!--Products Names Start-->
						<td style="width: 20%;">
							<select name="name[]" id="name_1" class="form-control" oninput="get_detail_name(this.value,1);">
								<option value="">Choose Product</option>
								<?php $sqlP = mysqli_query($conn,"SELECT * FROM products ORDER BY name ASC");
								while($rowP = mysqli_fetch_assoc($sqlP)){?>
								<option value="<?php echo $rowP['name']?>"><?php echo $rowP['name'];?></option>
								<?php }?>
							</select>
						</td>
						<!--Products Names End-->
						<td>
							<input type="text" required class="form-control" readonly id="purchase_1" />
						</td>
						<td>
							<input type="text" required class="form-control" readonly id="mrp_1" name="mrp[]" />
						</td>
						<td>
							<input type="text" required class="form-control" readonly id="stock_1" name="stock[]" />
						</td>
						<td>
							<input type="number" class="form-control" oninput="calculate_price(this.value,1)" step="1" id="quantity_1" name="quantity[]" />
						</td>
						<td>
							<input value="0" type="number" class="form-control" oninput="calculate_price_disc(1)" id="discount_1" name="discount[]" max="100" />
						</td>
						<td>
							<input type="number" class="form-control" id="sale_price_1" readonly name="sale_price[]" />
						</td>
						<td style="visibility: hidden;"><a href="#" onclick="remove_data(1)" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td>
					</tr>
					</tbody>
					<tfoot id="foot" style="margin-top:20px;">
						<tr>
							<td><a href="#" onclick="add_data();" class="btn btn-sm btn-icon btn-pure btn-success on-default remove-row" data-toggle="tooltip" data-original-title="Add">Add Item</a></td>
							<td class="text-right" style="font-size: 18px;color:#37474f;padding-top:20px;" >Pending</td>
							<!--Pending Switch Start-->
							<td class="text-left">
								<label class="switch switch-3d switch-primary" style="margin-top: 30px;">
									<input id="check" type="checkbox" class="switch-input" onclick="check_func();">
									<span class="switch-label"></span>
									<span class="switch-handle"></span>
								</label>
							</td>
							<!--Pending Switch End-->
							<td colspan="4" class='text-right'><b>Total : </b></td>
							<td colspan="1"><input type="number" class="form-control" readonly name="total" value="0" id="getTotal" /></td>
						</tr>
					</tfoot>
				</table>
				<!--Products Table End-->

                <div class="row last-row" id="last-row">
					<!--Paid Row Start-->
					<div class="row last-row col-md-12" id="hide">
						<label class="col-md-1" style="margin-left: 200px;">Customer: </label>
						<select id="cust_id" name="cust_id" class="form-control col-md-2" oninput="switch_cust_name();" required>
							<option selected disabled> </option>
							<option value="-1"> + New Customer</option>
							<?php
							$sql = 'SELECT `id`,`name` FROM `customer` ORDER BY `id` ASC';
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($result)){
							?>
							<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
							<?php } ?>
						</select>
						
						<label class="col-md-1" id="cust_name_label" style="visibility: hidden;">Name: </label>
						<input id="cust_name" style="visibility: hidden;" name="cust_name" type="text" class="form-control col-md-2" oninput="validate_name();" >
						<button type="submit" name="make_print" class="btn btn-primary form-control col-md-1 right-align" id="validateButton2" style="margin-left: 200px;">Submit</button>
					</div>
					<!--Paid Row End-->
				</div>
              </form>
            </div>
          </div>
          <!-- End Panel Standard Mode -->
		</div>
      </div>
    </div>
  </div>
  <!-- End Page -->
<script src="global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
  
<script type="text/javascript">

//calculate pending amount
function my_func() {
	var received = document.getElementById("received");
	var pending = document.getElementById('pending');
	var total = document.getElementById('getTotal');

	if (Math.abs(received.value) < Math.abs(total.value)) {
		pending.value = Math.abs(total.value) - Math.abs(received.value);
	}
	else{
		pending.value = 0;
	}
}

function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}

function default_focus(){
	document.getElementById('bar_code_1').focus();
}

function validate_name(){
	let option = document.getElementById("cust_id");
	let cust_name = document.getElementById("cust_name");
	for(let i=2; i<option.length; i++){
		if(option[i].innerHTML==cust_name.value){
			alert("Custumer Name already exists. Please select different name !");
		}
	}
}

//get product details by barcode
function get_detail(b,n){
	var nx = n+1;
	$.ajax({
		type:"POST",  
		url:"ajax_product.php",
		data:{bar_code:b,action_type:"get_detail"},
		success:function(data){
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				var newRow = $('#app tbody').append('<tr id='+nx+'><input type="hidden" id="product_id_'+nx+'" name="product_id[]" /><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+');" required ><option value="">Choose Product</option><?php $sqlP = mysqli_query($conn,"SELECT * FROM products ORDER BY name ASC"); while($rowP = mysqli_fetch_assoc($sqlP)){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" required class="form-control" readonly id="purchase_'+nx+'" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="text" required class="form-control" readonly id="stock_'+nx+'" name="stock[]" /></td><td><input type="number" id="quantity_'+nx+'" step="1" class="form-control" oninput="calculate_price(this.value,'+nx+')" name="quantity[]" /></td><td><input type="number" value="0" class="form-control" oninput="calculate_price_disc('+nx+')" id="discount_'+nx+'" name="discount[]"></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" readonly name="sale_price[]" step="1" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('product_id_'+n).value = data.product_id;
				document.getElementById('stock_'+n).value = data.stock;
				document.getElementById('purchase_'+n).value = data.purchase;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('sale_price_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).max = data.stock;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				document.getElementById("received").value = document.getElementById('getTotal').value;
				
				document.getElementById('bar_code_'+nx).focus();
			}else{
				alert("Barcode Not Found");
				document.getElementById('bar_code_'+n).value = '';
				document.getElementById('bar_code_'+n).focus();
				return false;
			}
		}  
	});
}

//get product details by product name
function get_detail_name(i,n){
	var nx = n+1;
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{name:i,action_type:"get_detail_by_name"},
		success:function(data){ 
			var data = $.parseJSON(data);
			
			if(data.type == 'Success'){	
				//Appending New Row
				var newRow = $('#app tbody').append('<tr id='+nx+'><input type="hidden" id="product_id_'+nx+'" name="product_id[]" /><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+');" required ><option value="">Choose Product</option><?php $sqlP = mysqli_query($conn,"SELECT * FROM products ORDER BY name ASC"); while($rowP = mysqli_fetch_assoc($sqlP)){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" required class="form-control" readonly id="purchase_'+nx+'" /></td><td><input type="text" id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="text" required class="form-control" readonly id="stock_'+nx+'" name="stock[]" /></td><td><input type="number" id="quantity_'+nx+'" step="1" class="form-control" oninput="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="number" value="0" class="form-control" oninput="calculate_price_disc('+nx+')" id="discount_'+nx+'" name="discount[]"></td><td><input type="number" id="sale_price_'+nx+'" readonly class="form-control" name="sale_price[]" step="1" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('product_id_'+n).value = data.product_id;
				document.getElementById('stock_'+n).value = data.stock;
				document.getElementById('purchase_'+n).value = data.purchase;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('sale_price_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).max = data.stock;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				document.getElementById("received").value = document.getElementById('getTotal').value;
				
				document.getElementById('name_'+nx).focus();
			}
			else{
				alert("Product Not Found!");
			}
		}  
	});
}

//calculate total prices
function calculate_price(q,n){
	var rate = document.getElementById('mrp_'+n).value;
	var sp = document.getElementById('sale_price_'+n).value;
	var total_before = rate * q;
	var disc_per_unit = ((document.getElementById('discount_'+n).value) / 100) * rate;
	var total_disc = disc_per_unit * q;
	var total_after = total_before - total_disc;
	//var total = document.getElementById('getTotal').value;
	var gt = document.getElementById('sale_price_'+n).value = total_after;
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length ; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	document.getElementById("received").value = document.getElementById('getTotal').value;
	//alert(aac);
	//document.getElementById('getTotal').value = Math.round((parseFloat(total) - parseFloat(sp)) + parseFloat(gt));
}

//calculate prices after discount
function calculate_price_disc(n){
	var rate = document.getElementById('mrp_'+n).value;
	var sp = document.getElementById('sale_price_'+n).value;
	var q = document.getElementById('quantity_'+n).value;
	var total_before = rate * q;
	var disc_per_unit = document.getElementById('discount_'+n).value / 100 * rate;
	var total_disc = disc_per_unit * q;
	var total_after = total_before - total_disc;
	//var total = document.getElementById('getTotal').value;
	var gt = document.getElementById('sale_price_'+n).value = total_after;
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length ; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	document.getElementById("received").value = document.getElementById('getTotal').value;
	//alert(aac);
	//document.getElementById('getTotal').value = Math.round((parseFloat(total) - parseFloat(sp)) + parseFloat(gt));
}

//get float type sum
function getSum(total, num) {
  return parseFloat(total + num);
}

//add a new product row
function add_data(){
	var barCode = document.querySelectorAll("#dd input[name='bar_code[]']").length;
	var nx = barCode+1;
	var newRow = $('#app tbody').append('<tr id='+nx+'><input type="hidden" id="product_id_'+nx+'" name="product_id[]" /><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+');" required ><option value="">Choose Product</option><?php $sqlP = mysqli_query($conn,"SELECT * FROM products ORDER BY name ASC"); while($rowP = mysqli_fetch_assoc($sqlP)){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" required class="form-control" readonly id="purchase_'+nx+'" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="text" required class="form-control" readonly id="stock_'+nx+'" name="stock[]" /></td><td><input type="number" id="quantity_'+nx+'" step="1" class="form-control" oninput="calculate_price(this.value,'+nx+')" name="quantity[]" /></td><td><input type="number" class="form-control" oninput="calculate_price_disc('+nx+')" id="discount_'+nx+'" name="discount[]"></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" readonly name="sale_price[]" step="1" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
}

//remove last product row
function remove_data(r){
	$('#'+r).remove();
	//Get Value For Total
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
	var newA = [];
	for(key=0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	document.getElementById("received").value = document.getElementById('getTotal').value;
}

//submit and print
$(".billingForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
		type: "POST",
		url: "ajax_sale.php",
		data: form.serializeArray(), // serializes the form's elements.
		success: function(data){

			if(data != "ERROR"){
				newWin= window.open("");
				newWin.location.replace('http://localhost/pos/ply-wood/view_invoice.php?id='+data);
				newWin.print();
				newWin.close();
				window.location.reload(true);
			}
			else{
				alert("Something Went Wrong, Please Try Again !");
			}
		}
	});
});

//check for pending switch
function check_func(){
	if(document.getElementById("check").checked==false){
		document.getElementById("last-row").innerHTML = '<!--Paid Row Start--><div class="row last-row col-md-12" id="hide"><label class="col-md-1" style="margin-left: 200px;">Customer: </label><select oninput="switch_cust_name();" id="cust_id" name="cust_id" class="form-control col-md-2" required ><option selected disabled> </option><option value="-1"> + New</option><?php $sql = "SELECT `id`,`name` FROM `customer` ORDER BY `id` ASC";$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_assoc($result)){ ?><option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option><?php } ?></select><label id="cust_name_label" style="visibility: hidden;" class="col-md-1">Name: </label><input style="visibility: hidden;" id="cust_name" name="cust_name" type="text" class="form-control col-md-2" oninput="validate_name();" ><button type="submit" name="make_print" class="btn btn-primary form-control col-md-1 right-align" id="validateButton2" style="margin-left: 200px;">Submit</button></div><!--Paid Row End-->';
	}
	else{
		document.getElementById("last-row").innerHTML = '<!--Pending Row Start--><div id="show" class="row last-row"><label>Received: </label><input type="number" value="'+document.getElementById("getTotal").value+'" oninput="my_func();" id="received" name="received" class="form-control col-md-1"><label>Pending: </label><input readonly required id="pending" name="pending" type="text" value="0" class="form-control col-md-1"><label>Payment Date: </label><input type="date" id="due_date" name="due_date" class="form-control col-md-1" required><!--Customers List Start--><label>Customer: </label><select oninput="switch_cust_name();" id="cust_id" name="cust_id" class="form-control col-md-1" required ><option selected disabled> </option><option value="-1"> + New</option><?php $sql = "SELECT `id`,`name` FROM `customer` ORDER BY `id` ASC";$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_assoc($result)){	?><option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option><?php } ?></select><!--Customers List End--><label id="cust_name_label" style="visibility: hidden;">Name: </label><input style="visibility: hidden;" id="cust_name" name="cust_name" type="text" class="form-control col-md-1" oninput="validate_name();" ><button type="submit" name="make_print" class="btn btn-primary form-control col-md-1" id="validateButton2" style="margin-left: 50px;">Submit</button></div><!--Pending Row End-->';
	}
}

function switch_cust_name(){
	if(document.getElementById("cust_id").value==-1){
		document.getElementById("cust_name").style.visibility='visible';
		document.getElementById("cust_name_label").style.visibility='visible';
		document.getElementById("cust_name").required=true;
	}
	else{
		document.getElementById("cust_name").style.visibility='hidden';
		document.getElementById("cust_name_label").style.visibility='hidden';
		document.getElementById("cust_name").required=false;
	}
}

</script>

</body>
</html>