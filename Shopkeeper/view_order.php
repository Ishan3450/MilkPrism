<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["shop_id"]))
{
	header("location:index.php");
}
$id = $_SESSION["shop_id"];
$category = $con->query("select * from orders where shop_id='$id'");


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
<title>View Delivery Man Details</title>
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
				<div class="tables">
					<h2 class="title1">View Orders</h2>
					<div class="panel-body widget-shadow">
						<h4>View Order Details:</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>Order ID</th>
								  <th>Product Name</th>
								  <th>Customer Name</th>
								  <th>Shop Name</th>
								  <th>Quantity</th>
								  <th>Order Date</th>
								  <th>Amount</th>
								  <th>Duration</th>
								  <th>Address</th>
								  <th>Delivery</th>
								</tr>
							</thead>
							<?php
								while($row = $category->fetch_object())
								{
									$o_id = $row->order_id;
									$info = $con->query("select * from order_items where order_id='$o_id'");

									while($odR = $info -> fetch_object()){
									$sh = $con->query("select * from shop where shop_id='$row->shop_id'");
									$shop = $sh->fetch_object();
									$pd = $con->query("select * from product where product_id='$odR->product_id'");
									$product = $pd->fetch_object();
									$cust = $con->query("select * from customer where customer_id='$row->customer_id'");
									$customer = $cust->fetch_object();

							?>
							<tbody>
								<tr>
								  <th scope="row"><?php echo "$row->order_id"; ?></th>
								  <td><?php echo "$product->product_name"; ?></td>
								  <td><?php echo "$customer->name"; ?></td>
								  <td><?php echo "$shop->shop_name"; ?></td>
								  <td><?php echo "$row->quantity"; ?></td>
								  <td><?php echo "$row->order_date"; ?></td>
								  <td><?php echo "$odR->price"; ?></td>
								  <td><?php echo "$row->duration"; ?></td>
								  <td><?php echo "$customer->address"; ?></td>
								  <?php if($row->isDelivered){ ?>
									<td style="color:#3c7651" >Delivered</td>
								  <?php } else{ ?>
									<td style="color:red">Remaining</td>
								  <?php } ?>
								</tr>	
							</tbody>
							<?php
									}
									?>
									<tr style="border-bottom: 2px solid black;">
									<td colspan="2">Order no : <?php echo $row->order_id ?> </td>
									<td colspan="2">Total Amount : <?php echo $row->amount ?></td>
									</tr>
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