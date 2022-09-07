<?php
session_start();
include 'common/connection.php';
if (isset($_SESSION['customer_id'])) {
    $cid = $_SESSION['customer_id'];
}

$products = $con->query("select * from product");

if (isset($_POST['submit'])) {
    $product_id    = $_POST['product_id'];
    $product_price   = $_POST['price'];
    $product_qty     = $_POST['qty'];
    

    # to check whether the product is already in the cart or not
    $cart_result = $con->query("select * from cart where customer_id='$cid' and product_id='$product_id'");
    $cart_row_count = $cart_result->num_rows;

    if ($cart_row_count == 1) {
        echo "<script>alert('Product Already Exist in Cart'); document.location='cart.php';</script>";
    } else {
        $r = $con->query("insert into cart(quantity,price,product_id,customer_id) values('$product_qty','$product_price','$product_id','$cid')");
        if ($r) {
            echo "<script>alert('Added to Cart')</script>";
        } else {
            header('location:index.php');
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> MilkPrism</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>

    <!-- ################# Header Starts Here#######################--->
    <?php include 'common/header.php'; ?>


    <!-- ################# Slider Starts Here#######################--->

    <div class="slider-detail" style="height: 100%;">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <!-- <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slider1.jpg" width="100%" alt="First slide">

                </div> -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slider2.jpg" width="100%" alt="First slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/slider/slider3.jpg" height="500px " width="100%" alt="Second slide">

                </div>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    <br><br><br><br>

    <!-- ################# Key Features Starts Here#######################--->
    <!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                            <select class="w-100 form-control mt-lg-1 mt-md-2" id="shop" name="shop">
                                                <option>--Select Shop--</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary active w-100">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> -->
    <form method="post">
        <section class="key-features">
            <div class="container">
                <div class="inner-title">

                    <h2>Products</h2>
                    <p></p>
                </div>
                <div class="row">
                    <?php
                    while ($product = $products->fetch_object()) {
                    ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="single-key">
                                <a href="product_details.php?p_id=<?php echo $product->product_id; ?>"> 
                                
                                <img src="../ADMIN/upload/<?php echo $product->image; ?>" style="border-radius:10px" height="200">
                                <input type="hidden" id="price" name="price" value="<?php echo $product->price; ?>">
                                <input type="hidden" id="product_id" name="product_id" value="<?php echo $product->product_id; ?>">
                                <h5 style="font-size: 2em;margin-top:10px;"><?php echo $product->product_name; ?></h5>
                                <p><?php echo $product->description; ?></p>
                                <h5 style="margin-top: 10px;">Price : <?php echo $product->price; ?></h5>
                                
                                </a>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>






            </div>

        </section>
    </form>


    <!-- ################# Our Team Starts Here#######################--->


    <section class="our-team">
        <div class="container">
            <div class="inner-title">
                <h2>Meet Our Team</h2>
                <p>Take a look at our innovative and experiance team</p>
            </div>
            <div class="row team-member">
                <div class="col-md-4 col-sm-6">
                    <div class="user-card">
                        <div class="userar">
                            <img class="teammempic" alt="" style="border-radius: 10px;box-shadow:0px 0px 5px gray" src="assets/images/team/Ishan.jpeg">
                        </div>
                        <div class="detfs">
                            <p>Jagani Ishan</p>
                            <!-- <ul>
                                <li><a href="#"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-github fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p fa-lg"></i></a></li>
                            </ul>
                             <br> -->
                            <p>Student of IT at Government Polytechnic Gandhinagar</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="user-card">
                        <div class="userar">
                            <img class="teammempic" alt="" style="border-radius: 10px;box-shadow:0px 0px 5px gray" src="assets/images/team/Adarsh.jpeg">
                        </div>
                        <div class="detfs">
                            <p>Adarsh Dhorajiya</p>
                            <!-- <ul>
                                <li><a href="#"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-github fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p fa-lg"></i></a></li>
                            </ul>
                              <br>   -->
                            <p>Student of IT at Government Polytechnic Gandhinagar</p>

                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="user-card">
                        <div class="userar">
                            <img class="teammempic" alt="" style="border-radius: 10px;box-shadow:0px 0px 5px gray" src="assets/images/team/sahil.jpg">
                        </div>
                        <div class="detfs">
                            <p>Sahil Hindaniya</p>
                            <!-- <ul>
                                <li><a href="#"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-github fa-lg"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p fa-lg"></i></a></li>
                            </ul>
                             <br>   -->
                            <p>Student of IT at Government Polytechnic Gandhinagar</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
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