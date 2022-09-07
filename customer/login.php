<?php
session_start();
include 'common/connection.php';

if(isset($_POST["submit"]))
{
  $email = $_POST["email"];
  $pass = $_POST["password"];

  $result = $con->query("select * from customer where email='$email' and password='$pass'");
  $rowcount = $result->num_rows;

  if($rowcount!=0)
  {
    $row = $result->fetch_object();
    $id = $row->customer_id;
    $_SESSION["customer_id"] = $id;
    header('location:index.php');
  }
  else
  {
    echo "<script>alert('Email or Password wrong')</script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

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
                           <h2>Milk Prism</h2>
                           <ul>
                               <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                               <li><i class="fas fa-angle-double-right"></i> Login</li>
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
            <h2 style="margin-bottom:20px">Login</h2>
            <form method="post">
                
                <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Enter Email :</label></div>
                    <div class="col-sm-8"><input type="email" id="email" name="email" placeholder="Enter Email Address" class="form-control input-sm" required  ></div>
                </div>
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Password:</label></div>
                    <div class="col-sm-8"><input type="password" id="password" name="password" placeholder="Enter Password" class="form-control input-sm"  required ></div>
                </div>
                 
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button id="submit" name="submit" class="btn btn-danger btn-sm">Login</button>
                    </div>
                </div>
                <div style="margin-top:20px;margin-left: 8px;text-decoration:underline" class="row">
                  <div class="col-sm-3"></div>
                  <a href="register.php">Don't Have An Account? Register Now</a>
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