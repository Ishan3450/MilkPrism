<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["shop_id"]))
{
	header("location:index.php");
}
$id = $_GET["detail"];

$category = $con->query("select * from deliveryman where deliveryman_id='$id'");
$customer = $category->fetch_object();

$city = $con->query("select * from shop where shop_id='$customer->shop_id'");
$shop = $city->fetch_object();


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Deliveryman Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
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
				<h2 class="title1">Deliveryman Detail</h2>
					<div class="panel-body widget-shadow">
						<h4 style="padding-bottom: 1em;">View DeliveryMan Details:</h4>
						<table class="table">
							
								<tr>
								  <th>Deliveryman ID</th>
								  <td><?php echo "$customer->deliveryman_id"; ?></td>
								</tr>
								<tr>
								  <th>First Name</th>
								  <td><?php echo "$customer->fname"; ?></td>
								</tr>
								<tr>
								  <th>Last Name</th>
								  <td><?php echo "$customer->lname"; ?></td>
								</tr>
								<tr>
								  <th>Email</th>
								  <td><?php echo "$customer->email"; ?></td>
								</tr>
								<tr>
								  <th>Contact</th>
								  <td><?php echo "$customer->contact"; ?></td>
								</tr>
								<tr>
								  <th>Address</th>
								  <td><?php echo "$customer->address"; ?></td>
								</tr>
								<tr>
								  <th>Pincode</th>
								  <td><?php echo "$customer->pincode"; ?></td>
								</tr>
								<tr>
								  <th>Shop Name</th>
								  <td><?php echo "$shop->shop_name"; ?></td>
								</tr>									

						</table>
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