<?php 
session_start();
include "common/connection.php";

if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}

$id = $_GET['inqId'];

$result = $con -> query("DELETE FROM contact WHERE contact_id='$id' ");

if($result){
    header("location:view_inquiry.php");
} else {
    echo "<script>alert('Something went wrong !!'); document.location='view_inquiry.php'</script>";
}

?>