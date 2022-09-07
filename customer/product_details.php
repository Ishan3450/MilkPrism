<?php 
session_start();
if (!isset($_SESSION['customer_id']))
 {
    header('location:index.php');
}
include 'common/connection.php';

$pid = $_GET['p_id'];

$cid = $_SESSION['customer_id'];

$product = $con->query("select * from product where product_id='$pid'");

$result = $product->fetch_object();

if (isset($_POST['submit']))
{
    $product_id    = $_POST['product_id'];
    $product_price   = $_POST['price'];
    $product_qty     = $_POST['qty'];


    $cart_result = $con->query("select * from cart where customer_id='$cid' and product_id='$product_id'");
    $cart_row_count = $cart_result->num_rows;

    if($cart_row_count == 1)
    {
        echo "<script>alert('Product Already Exist in Cart'); document.location='cart.php';</script>";
    }
    else
    {
        
        $r =$con->query("insert into cart(quantity,price,product_id,customer_id) values('$product_qty','$product_price','$product_id','$cid')");
        // if ($r) 
        // {
        //      echo "<script>alert('Added to Cart')</script>";
        // }
        // else
        // {
        //     header('location:index.php');
        // }
    }
}



?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Details</title>

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
                           <h2>About Hospital</h2>
                           <ul>
                               <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                               <li><i class="fas fa-angle-double-right"></i> Product Details</li>
                           </ul>
                       </div>
                   </div>
               </div>
       
         <!-- ######## Page  Title End ####### -->
    

   
 <!--  ************************* About Us Content Start Here  ************************** -->
            <form method="post">
            <div class="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                           <img src="../ADMIN/upload/<?php echo "$result->image" ?>" style="box-shadow:0px 0px 0px;border-radius:20px">
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <h2 class="text-success"></h2>
                            
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary "><b>Product Name : </b><?php echo $result->product_name; ?></li>
                                <li class="list-group-item list-group-item-primary "><b>Description : </b><?php echo $result->description; ?></li>
                              <li class="list-group-item list-group-item-primary "><b>Price : </b><?php echo $result->price; ?></li>
                                <input type="hidden" id="price" name="price" value="<?php echo $result->price; ?>">
                        <input type="hidden" id="product_id" name="product_id" value="<?php echo $result->product_id; ?>">
                              </li>
                                    </ul>
                                    <br>
                                   <input class="" type="hidden" id="qty" name="qty" value="1" min="1"> 
                                 <button class="btn btn-danger btn-sm" id="submit" name="submit" style="width: 120px;height: 40px">Add To Cart</button>
                                 <?php 
                                 if(isset($_POST['submit'])){
                                            if ($r) 
                                            {
                                                echo '<div class="alert alert-success text-center" style="margin-top:15px" role="alert">Product added to Cart !!</div>';
                                            }
                                            else
                                            {
                                                header('location:index.php');
                                            }
                                        }
                                    
                                 ?>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
 <!-- ----------------------------------------------------------------------------------- -->
           

 

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