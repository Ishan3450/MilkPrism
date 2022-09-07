<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet"> 

</head>

 
 <header>
     <div class="header-top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-7 col-md-12 left-item">
                     <ul>
                         <li></li>
                         <li></li>
                     </ul>
                 </div>
                 <div class="col-lg-5 d-none d-lg-block right-item">

                 </div>
             </div>

         </div>
     </div>
     <div id="nav-head" class="header-nav">
         <div class="container">
             <div class="row">
                 <div class="col-md-3 col-sm-12 nav-img">
                     <a href="index.php"><span style="position: relative;top:20px; font-size: 30px;font-family: 'Redressed', cursive;">MilkPrism</span></a>
                     <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                 </div>
                 <div id="menu" class="col-md-9 d-none d-md-block nav-item">
                     <ul>
                         <li><a href="index.php">Home</a></li>
                         <li><a href="about_us.php">About Us</a></li>
                         <li><a href="viewShops.php">View Shops</a></li>

                         <li><a href="gallery.php">Gallery</a></li>
                         <li>
                             <a class=" dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                                 Reach Us
                             </a>
                             <div class="dropdown-menu">
                                 <a class="dropdown-item" href="contact_us.php">Contact Us</a>
                                 <?php
                                    if (isset($_SESSION['customer_id'])) { ?>
                                     <a class="dropdown-item" href="feedback.php">Feedback</a>

                                 <?php
                                    }
                                    ?>
                             </div>

                         </li>


                         <?php
                            if (isset($_SESSION['customer_id'])) {
                            ?>


                             <li>
                                 <a class=" dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                                     Account
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="cart.php">My Cart</a>
                                     <a class="dropdown-item" href="myorders.php">My Order</a>
                                     <a class="dropdown-item" href="profile.php">Profile</a>
                                     <a class="dropdown-item" href="change_password.php">Change Password</a>
                                 </div>
                             </li>
                         <?php
                            }
                            ?>
                         <?php
                            if (!isset($_SESSION['customer_id'])) {
                            ?>

                            <li>
                                 <a class=" dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                                     Login
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="login.php">Customer</a>
                                     <a class="dropdown-item" href="../../../milk_prism/Shopkeeper/index.php" target="_blank">Shop</a>
                                     <a class="dropdown-item" href="../../../milk_prism/deliveryman/index.php" target="_blank">Deliveryman</a>
                                 </div>
                             </li>
                             
                         <?php
                            }
                            ?>
                         <?php
                            if (isset($_SESSION['customer_id'])) {
                            ?>
                             <li> <a href="logout.php">Logout</a></li>
                         <?php
                            }
                            ?>
                     </ul>
                 </div>
             </div>

         </div>
     </div>

 </header>