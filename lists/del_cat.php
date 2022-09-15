<?php
include("../includes/db-connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (!empty($_GET["id"])) {
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = 'SELECT * FROM `categories` WHERE `id`=' . $id;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        if ($row["parent_id"]!=0) {
            $del_prod_sql = 'DELETE FROM `products` WHERE `sub_category`=' . $id;
            mysqli_query($conn,$del_prod_sql);
        }
        else if ($row["parent_id"]==0){
            $del_prod_sql = 'DELETE FROM `products` WHERE `category`=' . $id;
            mysqli_query($conn,$del_prod_sql);
            $del_sub_cat_sql = "DELETE FROM `categories` WHERE `parent_id`=" . $id;
            mysqli_query($conn,$del_sub_cat_sql);
        }

        $del_cat_sql = 'DELETE FROM `categories` WHERE `id`=' . $id;
        mysqli_query($conn,$del_cat_sql);

        header("Location: index.php");
    }
} mysqli_close($conn);
?>