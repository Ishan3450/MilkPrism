<?php
session_start();
include "common/connection.php";

$cities = $con->query("select * from city");
$areas = $con->query("select * from area");


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
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	$date = date('Y-m-d');

	$filename=$_FILES["shop_image"]["name"];

	$f=explode(".", $filename);

	$ext=strtolower(end($f));

	$tmp=$_FILES["shop_image"]["tmp_name"];

	$path="upload/$filename";
 
 		$result=$con->query("select * from shop where shop_email='$shop_email'");
    	$rowcount=$result->num_rows;

        // if($rowcount==1)
        // {
        //     echo "<script>alert('Email already exist');</script>";
        // }
		if($password==$cpassword)
        {
		if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif' || $ext=='jfif')
		{
			move_uploaded_file($tmp, $path);

			$exe = $con->query("INSERT INTO shop(shop_name,shop_email,shop_contact,shop_address,city_id,area_id,pincode,shopkeeper_name,shopkeeper_contact,shop_image,registration_date,password) VALUES('$shop_name','$shop_email','$shop_contact','$shop_address','$city','$area','$pincode','$shopkeeper_name','$shopkeeper_contact','$filename','$date','$password')");

			if($exe)
			{
				echo "<script>alert('Register Sucsessfuly');document.location='index.php'</script>";
			}
			else
			{
				echo "<script>alert('Email or Password wrong')</script>";
			}
		}
		}
		else
		{
			echo "<script>alert('Password Mismatch')</script>";
		}
}

?>

<!DOCTYPE HTML>
<html style="background-color: #f1f1f1;">
<head>
<title>Milk Prism</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
				<h2 class="title1">Register Shop</h2>
				<div class="widget-shadow">
					<div class="login-body" style="padding-bottom: 32px;">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6">
									<label>Shop Name</label>
								<input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter Your Shop Name" required="">
								</div>
								<div class="col-lg-6">
									<label>Shop Email</label>
								<input type="email" class="form-control" id="shop_email" name="shop_email" placeholder="Enter Your Shop Email" required="" style="padding: 14px 15px 14px 12px;color: #555">
								<?php 
									if(isset($_POST['submit'])){
										if($rowcount == 1){
											echo '<div class="alert alert-danger text-center" style="margin-bottom:0px" role="alert">Email Already Exists!!</div>';
										}
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Shop Contact</label>
								<input type="text" class="form-control" maxlength="10" id="shop_contact" name="shop_contact" placeholder="Enter Your Shop Contact" required="">
								</div>
								<div class="col-lg-6">
									<label>Shop Address</label>
								<textarea class="form-control" id="shop_address" name="shop_address" placeholder="Enter Your Shop Address" required=""></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Select City</label>
								<select id="city" name="city" class="form-control">
									<option>--Select City--</option>
									<?php
										while($city = $cities->fetch_object())
										{
											?>
										<option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
											<?php
										}
									?>
								</select>
								</div>
								<div class="col-lg-6">
									<label>Select Area</label>
								<select id="area" name="area" class="form-control">
									<option>--Select Area--</option>
									<?php
										while($area = $areas->fetch_object())
										{
											?>
										<option value="<?php echo $area->area_id; ?>"><?php echo $area->area_name; ?></option>
											<?php
										}
									?>
								</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Pincode</label>
								<input type="text" class="form-control" maxlength="6" id="pincode" name="pincode" placeholder="Enter Pincode" required="">
								</div>
								<div class="col-lg-6">
									<label>Shop Image</label>
								<input type="file" class="form-control" id="shop_image" name="shop_image" required="">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Shopkeeper Name</label>
								<input type="text" class="form-control" id="shopkeeper_name" name="shopkeeper_name" placeholder="Enter Shopkeeper Name" required="">
								</div>
								<div class="col-lg-6">
									<label>Shopkeeper Contact</label>
								<input type="text" class="form-control" maxlength="10" id="shopkeeper_contact" name="shopkeeper_contact" placeholder="Enter Shopkeeper Contact" required="">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Password</label>
								<input type="text" class="form-control" minlength="8" id="password" name="password" placeholder="Enter Password" required="">
								</div>
								<div class="col-lg-6">
									<label>Confirm Password</label>
								<input type="text" class="form-control" minlength="8" id="cpassword" name="cpassword" placeholder="Enter Confirm Password" required="">
								<?php 
									if(isset($_POST['submit'])){
										if($password != $cpassword){
											echo '<div class="alert alert-danger text-center" role="alert">Password Mismatched !!</div>';
										}
									}
									?>
								</div>
							</div>
							<div class="row">
							<input type="submit" name="submit" id="submit" value="Register">
							</div>
							<br>
							<center>
							<a href="index.php">Already Registered? Login Now</a>
							</center>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	
	

		
   
</body>
</html>