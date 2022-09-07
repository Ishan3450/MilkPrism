<?php
session_start();
include "common/connection.php";

if (!isset($_SESSION["id"])) {
	header("location:index.php");
}

$id = $_GET["eareaid"];
$subcategory = $con->query("select * from area where area_id='$id'");
$result = $subcategory->fetch_object();

$category = $con->query("select * from city");

if (isset($_POST["submit"])) {
	$area = $_POST["area_name"];
	$selector1 = $_POST["selector1"];

	$a = $con->query("update area set area_name='$area',city_id='$selector1' where area_id='$id'");

	if ($a) {
		header("location:view_area.php");
	} else {
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
				<div class="forms">
					<h2 class="title1">Area</h2>


					<div class="row">
						<h3 class="title1">Update Area :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label for="area_name" class="col-sm-2 control-label">Update Area Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="area_name" name="area_name" value="<?php echo $result->area_name; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select City</label>
									<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
											<option value="">--select city--</option>
											<?php
											while ($row = $category->fetch_object()) {
											?>
												<option value="<?php echo ($row->city_id); ?>" <?php if ($result->city_id == "$row->city_id") {
																									echo "selected";
																								} ?>><?php echo ($row->city_name); ?></option>
											<?php
											}
											?>
										</select></div>
								</div>
								<div class="form-group">
									<div class="col-sm-12" style="text-align: center;">
										<input type="submit" class="btn btn-danger" id="submit" name="submit" value="update">
									</div>
								</div>

							</form>
						</div>
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