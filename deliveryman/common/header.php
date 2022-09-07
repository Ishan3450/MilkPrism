<?php

session_start();
include "connection.php";

if(!isset($_SESSION["deliveryman_id"]))
{
	header("location:login.php");
}

$id = $_SESSION["deliveryman_id"];
$admin = $con->query("select * from deliveryman where deliveryman_id='$id'");
$row = $admin->fetch_object();

?>
<div class="sticky-header header-section ">
			<div class="header-right">
				
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<i class="fa fa-address-card"></i>
									<div class="user-name">
										<p><?php echo "$row->fname";?></p>
										
									</div>	
									
									<i class="fa fa-angle-down"></i>
								</div>	
									
							</a>
							<ul class="dropdown-menu drp-mnu" >
								<li> <a href="../deliveryman/profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
								<li> <a href="../deliveryman/change_password.php"><i class="fa fa-suitcase"></i> Change Password</a> </li> 
								<li> <a href="../deliveryman/logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
							
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>