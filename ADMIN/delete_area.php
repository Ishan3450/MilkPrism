<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}

$id = $_GET["delareaid"];
$cat = $con->query("delete from area where area_id='$id'");

if($cat)
{
	header("location:view_area.php");
}
else
{
echo "<script>alert('Somthing went wrong..')</script>";
}


?>
