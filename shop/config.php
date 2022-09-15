<?php 
ob_start();

$DBhost="localhost";
$DBname="pos";
$DBuser="root";
$DBpass="";

$conn = mysqli_connect($DBhost,$DBuser,$DBpass,$DBname);

if (!$conn) {
   die("ERROR : ". mysqli_connect_error());
}
?>