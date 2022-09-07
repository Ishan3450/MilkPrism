<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}

$id = $_GET["delcityid"];
$cat = $con->query("delete from city where city_id='$id'");

if($cat)
{
	header("location:view_city.php");
}
else
{
echo "<script>alert('Somthing went wrong..')</script>";
}


?>
