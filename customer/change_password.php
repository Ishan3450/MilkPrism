<?php

session_start();
include "common/connection.php";

if(!isset($_SESSION["customer_id"]))
{
	header("location:index.php");
}
$id = $_SESSION["customer_id"];


if(isset($_POST["submit"]))
{
	$oldpassword = $_POST["opassword"];
	$newpassword = $_POST["npassword"];
	$cnewpassword = $_POST["cpassword"];

	$customer = $con->query("select * from customer where customer_id='$id' && password='$oldpassword'");
	$rowcount = $customer->num_rows;

	if($rowcount==1)
	{
		if($newpassword == $cnewpassword)
		{
			$con->query("update customer set password='$newpassword' where customer_id='$id'");
			
			header("location:index.php");
		}
		// else
		// {
		// 	echo "<script>alert('password miss matched')</script>";
		// }
	}
	// else
	// {
	// 	echo "<script>alert('Old password is wrong')</script>";
	// }
}

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Change Password</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>

    <!-- ################# Header Starts Here#######################--->
   <?php include 'common/header.php'?>


    
    <!-- ################# Our Team Starts Here#######################--->

      <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Milk Prism</h2>
                           <ul>
                               <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                               <li><i class="fas fa-angle-double-right"></i> Change Password</li>
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
            <h2 style="margin-bottom:20px">Change Password</h2>
                <form method="post"> 
                <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Old Password :</label></div>
                    <div class="col-sm-8"><input type="password" name="opassword" minlength="8" id="opassword" placeholder="Enter Old Password" class="form-control input-sm" value=""  >
                    <?php
                        if(isset($_POST['submit'])){
                            if($rowcount != 1){
                                echo '<div class="alert alert-danger text-center" role="alert">Old Password is Wrong !!</div>';
                            }
                        }
                        ?>

                    </div>
                </div>
                 
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>New Password:</label></div>
                    <div class="col-sm-8">
                      <input type="password" name="npassword" id="npassword" minlength="8" placeholder="Enter New Password" class="form-control input-sm" value=""  >
                    </div>
                </div>

                <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Confirm New Password :</label></div>
                    <div class="col-sm-8"><input type="password" name="cpassword" minlength="8" id="cpassword" placeholder="ReEnter New Password" class="form-control input-sm" value=""   >
                        <?php
                            if(isset($_POST['submit'])){
                                if($newpassword != $cnewpassword){
                                    echo '<div class="alert alert-danger text-center" role="alert">Password Mismatched !!</div>';
                                }
                            }
                            ?>
                    </div>
                </div>

                

                <div style="margin-top:10px;" class="row">
                    
                </div>

                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button class="btn btn-danger btn-sm" id="submit" name="submit">Change Password</button>
                    </div>
                </div>
              </form>
            </div>

            
                
             
         </div>

            </div>
        </div>
        
      </div>

    

   
    <!-- ################# Footer Starts Here#######################--->


     <?php include 'common/footer.php'?>

        </div>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>