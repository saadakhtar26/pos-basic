<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (!empty($_GET["id"])) {
        $sql = "UPDATE `dasti_khata` SET `status`=0 WHERE `id`=" . $conn->real_escape_string($_GET["id"]);
        mysqli_query($conn,$sql);
        header("Location: index.php?id=2");
    }
}
mysqli_close($conn);
?>