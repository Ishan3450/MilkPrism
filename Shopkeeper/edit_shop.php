<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["shop_id"]))
{
	header("location:index.php");
}

$id = $_GET["detail"];
$subcategory = $con->query("select * from shop where shop_id='$id'");
$result = $subcategory->fetch_object();

$category = $con->query("select * from city");
$aa = $con->query("select * from area");

if(isset($_POST["submit"]))
{
	$shop_name = $_POST["shop_name"];
	$shop_email = $_POST["shop_email"];
	$shop_contact = $_POST["shop_contact"];
	$shop_address = $_POST["shop_address"];
	$city = $_POST["city"];
	$area = $_POST["area"];
	$pincode = $_POST["pincode"];
	$shopkeeper_name = $_POST["shopkeeper_name"];
	$shopkeeper_contact = $_POST["shopkeeper_contact"];


	$a = $con->query("update shop set shop_name='$shop_name',shop_email='$shop_email',shop_contact='$shop_contact',shop_address='$shop_address',city_id='$city',area_id='$area',pincode='$pincode',shopkeeper_name='$shopkeeper_name',shopkeeper_contact='$shopkeeper_contact' where shop_id='$id'");

	if($a)
	{
	header("location:shop_detail.php");
	}
	else
	{
	echo "<script>alert('Somthing went wrong..')</script>";
	}
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit Area</title>
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
      <?php include "common/sidebar.php";?>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php include "common/header.php";?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Shop</h2>
					
					
					<div class="row">
						<h3 class="title1">Update Shop Details :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label for="shop_name" class="col-sm-2 control-label">Shop Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="shop_name" name="shop_name" value="<?php echo $result->shop_name;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shop_email" class="col-sm-2 control-label">Shop Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="shop_email" name="shop_email" value="<?php echo $result->shop_email;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shop_contact" class="col-sm-2 control-label">Shop Contact</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="shop_contact" name="shop_contact" value="<?php echo $result->shop_contact;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shop_address" class="col-sm-2 control-label">Shop Address</label>
									<div class="col-sm-8">
										<textarea id="shop_address" name="shop_address" class="form-control1"><?php echo $result->shop_address; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="city" class="col-sm-2 control-label">Select City</label>
									<div class="col-sm-8"><select name="city" id="city" class="form-control1">
										<option value="">--select city--</option>
										<?php
											while($row = $category->fetch_object())
											{
										?>
										<option value="<?php echo($row->city_id); ?>" <?php if($result->city_id=="$row->city_id"){echo "selected";} ?>><?php echo($row->city_name); ?></option>
										<?php
											}
										?>
									</select></div>
								</div>
								<div class="form-group">
									<label for="area" class="col-sm-2 control-label">Select Area</label>
									<div class="col-sm-8"><select name="area" id="area" class="form-control1">
										<option value="">--select area--</option>
										<?php
											while($a = $aa->fetch_object())
											{
										?>
										<option value="<?php echo($a->area_id); ?>" <?php if($result->city_id=="$a->area_id"){echo "selected";} ?>><?php echo($a->area_name); ?></option>
										<?php
											}
										?>
									</select></div>
								</div>
								<div class="form-group">
									<label for="pincode" class="col-sm-2 control-label">Pincode</label>
									<div class="col-sm-8">
										<input type="text" id="pincode" name="pincode" class="form-control1" value="<?php echo $result->pincode; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shopkeeper_name" class="col-sm-2 control-label">Shopkeeper Name</label>
									<div class="col-sm-8">
										<input type="text" id="shopkeeper_name" name="shopkeeper_name" class="form-control1" value="<?php echo $result->shopkeeper_name; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shopkeeper_contact" class="col-sm-2 control-label">Shopkeeper Contact</label>
									<div class="col-sm-8">
										<input type="text" id="shopkeeper_contact" name="shopkeeper_contact" class="form-control1" value="<?php echo $result->shopkeeper_contact; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shop_image" class="col-sm-2 control-label">Shop Image</label>
									<div class="col-sm-8">
										<img width="400" src="upload/<?php echo $result->shop_image; ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12" style="text-align: center;">
										<input type="submit" class="" id="submit" name="submit" value="update">
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!--footer-->
		<?php include "common/footer.php";?>
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