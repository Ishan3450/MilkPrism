<?php
session_start();
include 'common/connection.php';

if (!isset($_SESSION['customer_id'])) {
  header('location:index.php');
}

$cities = $con->query("select * from city");
$areas = $con->query("select * from area");

$id = $_SESSION['customer_id'];

$w = $con->query("select * from customer where customer_id='$id'");
$result = $w->fetch_object();



if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];
  $city = $_POST['city'];
  $area = $_POST['area'];


  // $r = $con->query("UPDATE customer SET name='$name',email='$email',contact='$contact',address='$address',pincode='$pincode',city_id='$city',area_id='$area' WHERE customer_id='$id'");
  $exe = $con -> query("UPDATE customer SET name='$name',email='$email',contact='$contact',address='$address',pincode='$pincode',city_id='$city',area_id='$area' WHERE customer_id='$id'  ");

  if ($exe) {
    echo "<script>alert('Update Success');document.location='index.php'</script>";
  } else{
    echo "<script>alert('Something went Wrong !!');</script>";
  }
}



?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Profile</title>

  <link rel="shortcut icon" href="assets/images/fav.jpg">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>

  <!-- ################# Header Starts Here#######################--->
  <?php include 'common/header.php' ?>



  <!-- ################# Our Team Starts Here#######################--->

  <!--  ************************* Page Title Starts Here ************************** -->
  <div class="page-nav no-margin row">
    <div class="container">
      <div class="row">
        <h2>Milk Prism</h2>
        <ul>
          <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
          <li><i class="fas fa-angle-double-right"></i> Profile</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ######## Page  Title End ####### -->



  <div style="margin-top:0px;" class="row no-margin">
  </div>

  <div class="row contact-rooo no-margin">
    <div class="container">
      <div class="row">


        <div style="padding:20px" class="col-sm-12">
          <h2 style="margin-bottom: 30px">Update Profile</h2>
          <form method="post">
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Name :</label></div>
              <div class="col-sm-8"><input type="text" name="name" id="name" placeholder="Enter Name" class="form-control input-sm" value="<?php echo $result->name; ?>"></div>
            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Email:</label></div>
              <div class="col-sm-8">
                <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control input-sm" value="<?php echo $result->email; ?>">
              </div>
            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Contact :</label></div>
              <div class="col-sm-8"><input type="text" name="contact" id="contact" placeholder="Enter Contact" maxlength="10" class="form-control input-sm" value="<?php echo $result->contact; ?>"></div>
            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Address :</label></div>
              <div class="col-sm-8">
                <textarea id="address" name="address" class="form-control input-sm" placeholder="Enter Address"><?php echo $result->address; ?></textarea>
              </div>
            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Pincode :</label></div>
              <div class="col-sm-8"><input type="text" name="pincode" id="pincode" maxlength="6" placeholder="Enter Pincode" class="form-control input-sm" value="<?php echo $result->pincode; ?>"></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Select City :</label></div>
              <div class="col-sm-8">
                <select id="city" name="city" class="form-control input-sm">
                  <option>--Select City--</option>
                  <?php
                  while ($city = $cities->fetch_object()) {
                  ?>
                    <option value="<?php echo $city->city_id; ?>" <?php if ($result->city_id == $city->city_id) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $city->city_name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Select Area :</label></div>
              <div class="col-sm-8">
                <select id="area" name="area" class="form-control">
                  <option>--Select Area--</option>
                  <?php
                  while ($area = $areas->fetch_object()) {
                  ?>
                    <option value="<?php echo $area->area_id; ?>" <?php if ($result->area_id == $area->area_id) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $area->area_name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <!-- <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Profile Image :</label></div>
                    <div class="col-sm-8"><input type="file" id="profile" name="profile" class="form-control input-sm"  ></div>
                </div> -->

            <div style="margin-top:10px;" class="row">

            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
              <div class="col-sm-8">
                <button class="btn btn-danger btn-sm" id="submit" name="submit">Update</button>
              </div>
            </div>
          </form>
        </div>




      </div>

    </div>
  </div>

  </div>




  <!-- ################# Footer Starts Here#######################--->


  <?php include 'common/footer.php' ?>

  </div>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>