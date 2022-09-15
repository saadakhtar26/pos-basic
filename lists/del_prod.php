<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (!empty($_GET["id"])) {
        $sql = "DELETE FROM `products` WHERE id=" . $conn->real_escape_string($_GET["id"]);
        mysqli_query($conn,$sql);
        header("Location: index.php");
    }
}
mysqli_close($conn);
?>