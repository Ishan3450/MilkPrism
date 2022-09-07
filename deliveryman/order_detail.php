<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["deliveryman_id"]))
{
	header("location:index.php");
}
$id = $_GET["o_id"];

$order = $con -> query("select * from orders where order_id='$id' ");
$obOrder = $order -> fetch_object();

if($obOrder -> isDelivered){
	header("location:view_order.php");
}

$sh = $con->query("select * from shop where shop_id='$obOrder->shop_id'");
$shop = $sh->fetch_object();

$pd = $con->query("select * from product where product_id='$obOrder->product_id'");
$product = $pd->fetch_object();

$cust = $con->query("select * from customer where customer_id='$obOrder->customer_id'");
$customer = $cust->fetch_object();


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Order Details</title>
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
				<h2 class="title1">Order Details</h2>
					<div class="panel-body widget-shadow">
						<h4 style="padding-bottom: 1em;">Order Shop Details:</h4>
						<table class="table">
							
								<tr>
								  <th>Order ID</th>
								  <td><?php echo "$obOrder->order_id"; ?></td>
								</tr>
								<tr>
								  <th>Product Name</th>
								  <td>
								  <?php $forOrder = $con -> query("select * from order_items where order_id='$obOrder->order_id' ") ?>
								  <?php while($row = $forOrder -> fetch_object()){
									    
										$pd = $con -> query("select * from product where product_id='$row->product_id' ");
										$pdName = $pd -> fetch_object();
									?>

								  <?php echo $pdName->product_name; ?> &nbsp;&nbsp;&nbsp;
								  <?php }  ?>
								  </td>
								</tr>
								<tr>
								  <th>Customer Name</th>
								  <td><?php echo "$customer->name"; ?></td>
								</tr>
								<tr>
								  <th>Shop Name</th>
								  <td><?php echo "$shop->shop_name"; ?></td>
								</tr>
								<tr>
								  <th>Quantity</th>
								  <td><?php echo "$obOrder->quantity"; ?></td>
								</tr>
								<tr>
								  <th>Order Date</th>
								  <td><?php echo "$obOrder->order_date"; ?></td>
								</tr>
								<tr>
								  <th>Amount</th>
								  <td><?php echo "$obOrder->amount"; ?></td>
								</tr>
								<tr>
								  <th>Duration</th>
								  <td><?php echo "$obOrder->duration"; ?></td>
								</tr>
								<tr>
								  <th>Address</th>
								  <td><?php echo "$customer->address"; ?></td>
								</tr>
								
								<tr>
									<td colspan="2"style="text-align: center;"><a class="btn btn-danger" href="order_delivered.php?o_id=<?php echo $obOrder->order_id; ?>">Delivered</a></td>
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