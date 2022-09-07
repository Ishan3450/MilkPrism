<?php

include 'common/connection.php';

session_start();
// if (!isset($_SESSION['customer_id']))
// {
//     header('location:index.php');
// }

$result = $con -> query("SELECT * FROM shop");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> View Shops</title>

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
                    <li><i class="fas fa-angle-double-right"></i> Shops</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ######## Page  Title End ####### -->



    <section class="key-features kf-2">
        <div class="container">
            <div class="inner-title">

                <h2>Shops</h2>
                <p style="font-size: 1rem;">Shops associated with MilkPrism</p>
            </div>
            
            <?php 
                while($row = $result -> fetch_object()){

                    $cityresult = $con -> query("SELECT * FROM city WHERE city_id=' $row->city_id ' ");
                    $cityobj = $cityresult->fetch_object();
                    $cityname = $cityobj->city_name;

                    $arearesult = $con -> query("SELECT * FROM area WHERE area_id='$row->area_id ' ");
                    $areaobj = $arearesult -> fetch_object();
                    $areaname = $areaobj -> area_name;
            ?>

            <div class="row" style="font-size: 1rem;">
                <div class="col-lg-10 offset-1">
                    <div class="single-key">
                        <img src="../Shopkeeper/upload/<?php echo $row->shop_image ?>" width="400" alt="" style="border-radius:10px">
                        <h3 style="margin: 10px;"><?php echo $row->shop_name ?></h3>
                        <?php 
                            if($row->status == 1){
                                echo '<div class="alert alert-success text-center" style="padding:5px" role="alert"><h4>Active</h4></div>'; 
                            } else{
                                echo '<div class="alert alert-danger text-center" style="padding:5px" role="alert"><h4>Not Active</h4></div>'; 
                            }
                        ?>
                        <div class="row" style="margin-top: 20px;text-align:start">
                            <div class="col-lg-6"><b>Contact :</b> +91 <?php echo $row->shop_contact ?></div>
                            <div class="col-lg-6"><b>Email :</b> <?php echo $row -> shop_email ?></div>
                        </div>
                        <div class="row" style="margin-top: 15px;text-align:start">
                            <div class="col-lg-6"><b>City : </b> <?php echo $cityname ?></div>
                            <div class="col-lg-6"><b>Area : </b> <?php echo $areaname ?></div>
                        </div>
                        <div class="row" style="margin-top: 15px;text-align:start">
                            <div class="col-lg-6"><b>Pincode : </b> <?php echo $row->pincode ?></div>
                            <div class="col-lg-6"><b>Shopkeeper : </b> <?php echo $row -> shopkeeper_name ?> </div>

                        </div>
                        <div class="row" style="margin-top: 25px;text-align:start">
                            <div class="col-lg-12">
                                <b>Address : </b> <p style="text-align:justify"><?php echo $row-> shop_address ?>.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php } ?>

    </section>



    <!-- ################# Footer Starts Here#######################--->


    <?php include 'common/footer.php'; ?>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>