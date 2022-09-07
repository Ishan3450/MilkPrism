<?php
session_start();
include "common/connection.php";

if (!isset($_SESSION["id"])) {
	header("location:index.php");
}

$category = $con->query("select * from customer");


?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Customers Details</title>
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

	<!-- font-awesome icons CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons CSS -->

	<!-- side nav css file -->
	<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
	<!-- side nav css file -->

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

</head>

<body class="cbp-spmenu-push">
	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<!--left-fixed -navigation-->
			<aside class="sidebar-left">
				<?php include "common/sidebar.php"; ?>
			</aside>
		</div>
		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<?php include "common/header.php"; ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1">Customers</h2>
					<div class="panel-body widget-shadow">
						<h4>View Customer:</h4>
						<table class="table">
							<thead>
								<tr>
									<th>Customer ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Pincode</th>
									<th>City</th>
									<th>Area</th>

									<th>View Detail</th>
								</tr>
							</thead>
							<?php
							while ($row = $category->fetch_object()) {
								// to get the city name
								$city = $con->query("select * from city where city_id='$row->city_id'");
								$city1 = $city->fetch_object();

								// to get the area name
								$area = $con->query("select * from area where city_id='$row->city_id'");
								$area1 = $area->fetch_object();
							?>
								<tbody>
									<tr>
										<th scope="row"><?php echo "$row->customer_id"; ?></th>
										<td><?php echo "$row->name"; ?></td>
										<td><?php echo "$row->email"; ?></td>
										<td><?php echo "$row->contact"; ?></td>
										<td><?php echo "$row->address"; ?></td>
										<td><?php echo "$row->pincode"; ?></td>
										<td><?php echo "$city1->city_name"; ?></td>
										<td><?php echo "$area1->area_name"; ?></td>

										<td><a href="customer_detail.php?detail=<?php echo $row->customer_id; ?>">Details</a></td>
									</tr>
								</tbody>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<?php include "common/footer.php"; ?>
		<!--//footer-->
	</div>

	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
		$('.sidebar-menu').SidebarNav()
	</script>
	<!-- //side nav js -->

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>

</body>

</html>