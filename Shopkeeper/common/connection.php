<?php

$con = new mysqli("localhost","root","","milk_prism");
if($con->connect_errno!=0)
{
	echo $con->connect_error;
	exit;
}

?>