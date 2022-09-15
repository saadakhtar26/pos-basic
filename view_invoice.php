<?php

if (!empty($_GET["id"])) {
    include("includes/db-connection.php");
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = 'SELECT * FROM `invoice` WHERE `id`=' . $id;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    
    if($row["chain_id"]==0){
        $sql2 = 'SELECT * FROM `invoice_details` WHERE `invoice_id`=' . $id;
    }
    else{
        $sql2 = 'SELECT * FROM `invoice_details` WHERE `invoice_id`=' . $row["chain_id"];
    }
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = 'SELECT `name` FROM `customer` WHERE `id`=' . $row["cust_id"];
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $customer = $row3["name"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, sans-serif;
        }
        div#invoice{
            width: 95%;
            margin-left: 2.5%;
            margin-top: 5px;
            padding: 0.5% 2%;
            border: 2px solid #aaa;
        }
        h1{
            font-weight: 1;
            text-align: center;
            text-decoration: underline;
            word-spacing: 30%;
            line-height: 130%;
        }
        p.discription{
            text-align: center;
            line-height: 140%;
        }
        table#products{
            clear: both;
            border: 1px solid #000;
            border-collapse: collapse;
            margin-top: 6%;
            width: 100%;
            border: none;
        }
        table#products th{
            border: 1px solid #000;
            float: center;
            padding: 8px;
            background-color: #000;
            color: #fff;
        }
        table#products tr{
            border-bottom: 1px solid #000;
        }
        table#products td{
            text-align: center;
            padding: 6px;
            max-width: 400px;
        }
        table#products tfoot{
            font-weight: bolder;
            font-size: large;
        }
        table#products tfoot tr{
            border-bottom: none;
        }
        #top-data{
            font-weight: bold;
            font-size: 115%;
            margin-top: 2%;
        }
        #top-data span{
            float: left;
        }
        </style>
    </head>
    <body>
        <div id="invoice">
            <h1>WELCOME PLYWOOD CENTER</h1>
            <p class="discription">UV, Arcylic and every type of imported & local sheet available.</p>
            <p class="discription">Main High Court Road, near Ghousia Masjid, Rawalpindi.</p>
            <p class="discription">Aql Deen: 0332-5721250 | Sahin Khan: 0332-3505550</p>
            <div id="top-data">
                <table style="width:100%;">
                    <tr>
                        <td>DATE: <?php echo date("d/m/Y", strtotime($row["date"])); ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td style="float:right;">INV# <?php echo $row["id"]; ?></td>
                    </tr>
                </table>
                
            </div>
            <table id="products">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Disc</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0 ;
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $counter++;
                    ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row2["name"]; ?></td>
                        <td><?php echo $row2["rate"]; ?></td>
                        <td><?php echo $row2["quantity"]; ?></td>
                        <td><?php echo $row2["discount"]; ?>%</td>
                        <td><?php echo $row2["total"]; ?></td>
                    </tr>   
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="tfoot">
                        <td colspan="5" style="text-align: right;">TOTAL:</td>
                        <td> <?php echo $row["total"]; ?></td>

                        <?php if($row["pending"]>0){ ?>
                            <tr>
                                <td colspan="5" style="text-align: right;">Pending:</td> 
                                <td><?php echo $row["pending"]; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right;">Received:</td> 
                                <td><?php echo $row["received"]; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right;">Due Date:</td>
                                <td><?php echo date("d/m/Y", strtotime($row["due_date"])); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right;">Customer:</td>
                                <td><?php echo $customer; ?></td>
                            </tr>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <p style="margin-top:90px;max-width:35%;font-size:x-large;">خریدا ہوا مال 2 دن کے اندر تبدیل ہو سکتا ہے۔ تبدیلی کے وقت یہ رسید ہمراہ لایں</p>
            <p style="float: left;margin-top:10px;">Thank You for Visiting !</p>
            <p style="float: right; text-align:right;clear: none;border:1px solid; border-collapse:collapse;padding:7px;margin-top:-60px;">Software by Saad Akhtar <br /> 0332-1712300<p>
            <div style="clear: both;"></div>
        </div>
    </body>
</html>
<?php mysqli_close($conn); ?>