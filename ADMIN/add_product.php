<?php
session_start();
include "common/connection.php";

if(!isset($_SESSION["id"]))
{
	header("location:index.php");
}

$category = $con->query("select * from shop");

if(isset($_POST["submit"]))
{
	$product_name = $_POST["product_name"];
	$description = trim($con->real_escape_string($_POST["description"]));
	$price = $_POST["price"];
	$selector1 = $_POST["selector1"];
	$filename=$_FILES["image"]["name"];

	$f=explode(".", $filename);

	$ext=strtolower(end($f));

	$tmp=$_FILES["image"]["tmp_name"];

	$path="upload/$filename";

	if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif' || $ext=='jfif')
    {
      move_uploaded_file($tmp, $path);

		$exe = $con->query("insert into product(product_name,description,price,image,shop_id) values('$product_name','$description','$price','$filename','$selector1')");
	}
}


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
<title>Add Product</title>
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
					<h2 class="title1">Products</h2>
					
					
					<div class="row">
						
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
								<h3 class="title1">Add Product :</h3>
								<div class="form-group">
									<label for="product_name" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="product_name" name="product_name" placeholder="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="description" class="col-sm-2 control-label">Product Description</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="description" name="description" placeholder="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="price" class="col-sm-2 control-label">Product Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="price" name="price" placeholder="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Shop</label>
									<div class="col-sm-8">
										<select name="selector1" id="selector1" class="form-control1" required>
										<option value="">--Select Shop--</option>
										<?php
											while($row = $category->fetch_object())
											{
										?>
										<option value="<?php echo($row->shop_id); ?>"><?php echo($row->shop_name); ?></option>
										<?php
											}
										?>
									</select></div>
								</div>
								<div class="form-group">
									<label for="image" class="col-sm-2 control-label">Product Image</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="image" name="image" placeholder="" required>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-12" style="text-align: center;">
										<input type="submit" class="btn btn-danger" id="submit" name="submit" value="Add Product">
									</div>
								</div>

								<div class="form-group text-center">
									<?php 
										if(isset($exe)){
											if($exe)
											{
											echo '<div class="alert alert-success" role="alert">Product Added Successfully !!</div>';
											}
											else
											{
											echo '<div class="alert alert-danger" role="alert">Something Went Wrong !!</div>';
											}
										}
									?>
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