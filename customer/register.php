<?php

include 'common/connection.php';

$cities = $con->query("select * from city");
$areas = $con->query("select * from area");

if (isset($_POST['submit'])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  $address = $_POST["address"];
  $pincode = $_POST["pincode"];
  $city = $_POST["city"];
  $area = $_POST["area"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  $result = $con->query("select * from customer where email='$email'");
  $rowcount = $result->num_rows;

  // if ($rowcount == 1) {
  //   echo "<script>alert('Email already exist');</script>";
  // }
  if ($password == $cpassword) {

    $exe = $con->query("INSERT INTO customer(name,email,contact,address,pincode,city_id,area_id,password) VALUES('$name','$email','$contact','$address','$pincode','$city','$area','$password')");
    if ($exe) {
      echo "<script>alert('Register Sucsessfuly');document.location='login.php'</script>";
    }
  } 
  // else {
  //   echo "<script>alert('Password Mismatch')</script>";
  // }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>

  <link rel="shortcut icon" href="assets/images/fav.jpg">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>

  <!-- ################# Header Starts Here#######################--->
  <?php include 'common/header.php'; ?>



  <!-- ################# Our Team Starts Here#######################--->

  <!--  ************************* Page Title Starts Here ************************** -->
  <div class="page-nav no-margin row">
    <div class="container">
      <div class="row">
        <h2>Register</h2>
        <ul>
          <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
          <li><i class="fas fa-angle-double-right"></i> About Us</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ######## Page  Title End ####### -->





  <div class="row contact-rooo no-margin">
    <div class="container">
      <div class="row">

        <div style="padding:20px" class="col-sm-3"></div>
        <div style="padding:20px" class="col-sm-6">
          <?php
          if (isset($_POST['submit'])) {
            if (!$exe) {
              echo '<div class="alert alert-danger text-center" role="alert">Something Went Wrong !!</div>';
            }
          }
          ?>

          <h2 style="margin-bottom:20px">Register Here</h2>
          <form method="post" enctype="multipart/form-data">

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Enter Name :</label></div>
              <div class="col-sm-8"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control input-sm" required></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Enter Email :</label></div>
              <div class="col-sm-8"><input type="email" id="email" name="email" placeholder="Enter Email Address" class="form-control input-sm" required></div>
              <?php
              if (isset($_POST['submit'])) {
                if ($rowcount == 1)
                  echo '<div class="alert alert-danger text-center" role="alert">Email already exists !!</div>';
              }

              ?>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Enter Contact :</label></div>
              <div class="col-sm-8"><input type="text" id="contact" name="contact" maxlength="10" placeholder="Enter Contact" class="form-control input-sm" required></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Enter Address :</label></div>
              <div class="col-sm-8"><textarea id="address" name="address" placeholder="Enter Address" class="form-control input-sm" required></textarea></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Enter Pincode :</label></div>
              <div class="col-sm-8"><input type="text" maxlength="6" id="pincode" name="pincode" placeholder="Enter Pincode" class="form-control input-sm" required></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Select City :</label></div>
              <div class="col-sm-8">
                <select id="city" name="city" class="form-control input-sm" required>
                  <option>--Select City--</option>
                  <?php
                  while ($city = $cities->fetch_object()) {
                  ?>
                    <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Select Area :</label></div>
              <div class="col-sm-8">
                <select id="area" name="area" class="form-control input-sm" required>
                  <option>--Select Area--</option>
                  <?php
                  while ($area = $areas->fetch_object()) {
                  ?>
                    <option value="<?php echo $area->area_id; ?>"><?php echo $area->area_name; ?></option>
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
              <div style="padding-top:10px;" class="col-sm-3"><label>Password:</label></div>
              <div class="col-sm-8"><input type="text" id="password" name="password" minlength="8" placeholder="Enter Password" class="form-control input-sm" required></div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label>Confirm Password:</label></div>
              <div class="col-sm-8"><input type="text" id="cpassword" name="cpassword" minlength="8" placeholder="Enter Confirm Password" class="form-control input-sm" required></div>
              <?php 
                if(isset($_POST['submit'])){
                  if($password != $cpassword){
                    echo '<div class="text-center alert alert-danger" role="alert">Password Mismatched !!</div>';
                  }
                }

              ?>
            </div>

            <div style="margin-top:10px;" class="row">
              <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
              <div class="col-sm-8">
                <button id="submit" name="submit" class="btn btn-danger btn-sm">Register</button>
              </div>
            </div>
            <div style="margin-top:10px;" class="row">
              <div class="col-sm-3"></div>
              <a href="login.php" style="text-decoration: underline; margin-left: 10px">Already Registerd ? Login Now</a>
            </div>
          </form>
        </div>
        <div style="padding:20px" class="col-sm-3"></div>

      </div>
    </div>

  </div>




  <!-- ################# Footer Starts Here#######################--->


  <?php include 'common/footer.php'; ?>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>