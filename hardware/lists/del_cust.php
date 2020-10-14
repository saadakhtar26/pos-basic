<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (!empty($_GET["id"])) {
        $sql = "DELETE FROM `customer` WHERE id=" . $_GET["id"];
        mysqli_query($conn,$sql);
        header("Location: http://localhost/pos/hardware/lists/index.php");
    }
}
mysqli_close($conn);
?>