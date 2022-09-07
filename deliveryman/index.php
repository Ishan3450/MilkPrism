<?php
session_start();
include "common/connection.php";

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$pass = $_POST["password"];

	$result = $con->query("select * from deliveryman where email='$email' and password='$pass'");
	$rowcount = $result->num_rows;

	if ($rowcount != 0) {
		$row = $result->fetch_object();
		$id = $row->deliveryman_id;
		$_SESSION["deliveryman_id"] = $id;
		header('location:dashboard.php');
	} else {
		echo "<script>alert('Email or Password wrong')</script>";
	}
}

?>

<!DOCTYPE HTML>
<html style="background-color: #f1f1f1;">

<head>
	<title>MilkPrism - Deliveryman</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS-->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons CSS-->


	<!-- js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//webfonts-->

	<!-- Metis Menu -->
	<script src="js/metisMenu.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="css/custom.css" rel="stylesheet">
	<!--//Metis Menu -->
	<style type="text/css">
		body {
			background-color: #f1f1f1;
		}
	</style>

</head>

<body class="">
	<div class="main-content">
		<!--left-fixed -navigation-->

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Login as Deliveryman</h2>
				<div class="widget-shadow">
					<div class="login-body" style="padding-bottom: 32px;">
						<form action="" method="post">
							<input style="padding: 14px 15px 14px 37px;" type="email" class="user" id="email" name="email" placeholder="Enter Your Email" required="">
							<input style="padding: 14px 15px 14px 37px;" type="password" id="password" name="password" class="lock" placeholder="Password" required="">

							<input type="submit" name="submit" id="submit" value="Login">
							<br>
							<center>
								<a href="register.php">Don't have an account? Register Now</a>
							</center>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>





</body>

</html>