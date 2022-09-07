<?php
include 'common/connection.php';
$id = $_GET['dcid'];

$d = $con->query("delete from cart where id='$id'");
if ($d) {
	header('location:cart.php');
} else {
	echo "<script>alert('error in delete')</script>";
}
