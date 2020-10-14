<?php 
ob_start();
session_start();
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

define('SITE_PATH',"http://localhost/shop");
$base_url="http://localhost/shop";
$DBhost="localhost";
$DBname="hardware";
$DBuser="root";
$DBpass="";

define('SITE_SEO',"");
define('SEO',"Admin Panel");
define('SITE_TITLE',"Shop");
define('SITE_ADMIN_TITLE',"Shop - Admin");
define('SITE_ADMIN_HEADER',"Shop Panel");

$conn = mysqli_connect($DBhost,$DBuser,$DBpass,$DBname);

if (!$conn) {
   die("ERROR : ". mysqli_connect_error());
}
?>