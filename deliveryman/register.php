<?php
session_start();
include "common/connection.php";

$shops = $con->query("select * from shop");

if(isset($_POST["submit"]))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];
	$pincode = $_POST["pincode"];
	$shop_id = $_POST["shop_id"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	$date = date('Y-m-d');

	
 
 		$result=$con->query("select * from deliveryman where email='$email'");
    	$rowcount=$result->num_rows;

        if($rowcount==1)
        {
            echo "<script>alert('Email already exist');</script>";
        }
        else if($password==$cpassword)
        {
		

			$exe = $con->query("INSERT INTO deliveryman(fname,lname,email,contact,address,pincode,password,reg_date,shop_id) VALUES('$fname','$lname','$email','$contact','$address','$pincode','$password','$date','$shop_id')");

			if($exe)
			{
				echo "<script>alert('Register Sucsessfuly');document.location='index.php'</script>";
			}
			else
			{
				echo "<script>alert('Email or Password wrong')</script>";
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
				<h2 class="title1">Register Deliveryman</h2>
				<div class="widget-shadow">
					<div class="login-body" style="padding-bottom: 32px;">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6">
									<label>First Name</label>
								<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name" required="">
								</div>
								<div class="col-lg-6">
									<label>Last Name</label>
								<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name" required="">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label>Email</label>
								<input type="email" style="padding: 14px 15px 14px 12px;color:#555" class="form-control" id="email" name="email" placeholder="Enter Your Email" required="">
								</div>
								<div class="col-lg-6">
									<label>Contact</label>
								<input type="text" class="form-control" maxlength="10" id="contact" name="contact" placeholder="Enter Your Contact Number" required="">
								</div>
							</div>
							<div class="row">
							<div class="col-lg-12">
									<label>Address</label>
								<textarea class="form-control" id="address" name="address" placeholder="Enter Your Address" required=""></textarea>
								</div>
								
							</div>

							<div class="row">
								<div class="col-lg-6">
									<label>Pincode</label>
								<input type="text" class="form-control" maxlength="6" id="pincode" name="pincode" placeholder="Enter Pincode" required="">
								</div>
								<div class="col-lg-6">
									<label>Select Shop</label>
								<select id="shop_id" name="shop_id" class="form-control">
									<option>--Select Shop--</option>
									<?php
										while($shop = $shops->fetch_object())
										{
											?>
										<option value="<?php echo $shop->shop_id; ?>"><?php echo $shop->shop_name; ?></option>
											<?php
										}
									?>
								</select>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<label>Password</label>
								<input type="text" class="form-control" id="password" minlength="8" name="password" placeholder="Enter Password" required="">
								</div>
								<div class="col-lg-6">
									<label>Confirm Password</label>
								<input type="text" class="form-control" id="cpassword" minlength="8" name="cpassword" placeholder="Enter Confirm Password" required="">
								</div>
							</div>
							<div class="row">
							<input type="submit" name="submit" id="submit" value="Register">
							</div>
							<br>
							<center>
							<a href="index.php">Already Registered? Login Here</a>
							</center>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	
	

		
   
</body>
</html>