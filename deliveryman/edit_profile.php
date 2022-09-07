<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["deliveryman_id"]))
{
	header("location:index.php");
}

$id = $_GET["detail"];
$subcategory = $con->query("select * from deliveryman where deliveryman_id='$id'");
$result = $subcategory->fetch_object();

$aa = $con->query("select * from shop");

if(isset($_POST["submit"]))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];
	$pincode = $_POST["pincode"];
	$shop_id = $_POST["shop_id"];


	$a = $con->query("update deliveryman set fname='$fname',lname='$lname',email='$email',contact='$contact',address='$address',pincode='$pincode',shop_id='$shop_id' where deliveryman_id='$id'");

	if($a)
	{
	header("location:profile.php");
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
									<label for="fname" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name" value="<?php echo $result->fname;?>" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="lname" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your First Name" value="<?php echo $result->lname;?>" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="email" name="email" value="<?php echo $result->email;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="contact" class="col-sm-2 control-label">Contact</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="contact" name="contact" value="<?php echo $result->contact;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="address" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<textarea class="form-control1" id="address" name="address"><?php echo $result->address;?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="pincode" class="col-sm-2 control-label">Pincode</label>
									<div class="col-sm-8">
										<input type="text" id="pincode" name="pincode" class="form-control1" value="<?php echo $result->pincode; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="shop_id" class="col-sm-2 control-label">Select Shop</label>
									<div class="col-sm-8"><select name="shop_id" id="shop_id" class="form-control1">
										<option value="">--select shop--</option>
										<?php
											while($a = $aa->fetch_object())
											{
										?>
										<option value="<?php echo($a->shop_id); ?>" <?php if($result->shop_id=="$a->shop_id"){echo "selected";} ?>><?php echo($a->shop_name); ?></option>
										<?php
											}
										?>
									</select></div>
								</div>
								
								
								<div class="form-group">
									<div class="col-sm-12" style="text-align: center;">
										<input type="submit" class="btn btn-danger	" id="submit" name="submit" value="update">
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