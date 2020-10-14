<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (!empty($_GET["id"])) {
        $sql = "DELETE FROM `products` WHERE id=" . $_GET["id"];
        mysqli_query($conn,$sql);
        header("Location: http://localhost/pos/ply-wood/lists/index.php");
    }
}
mysqli_close($conn);
?>