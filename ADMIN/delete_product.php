<?php
session_start();
include 'common/connection.php';

if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}

$pid = $_GET["pid"];
$con->query('SET foreign_key_checks = 0');
$exe = $con -> query("delete from product where product_id='$pid' ");


if($exe)
{
	header("location:view_product.php");
}
else
{
	echo "<script>alert('Somwthing went wrong !!');document.location='view_product.php';</script>";
}


?>
