<?php
include 'common/connection.php';

session_start();
if (!isset($_SESSION['customer_id'])) {
    header('location:index.php');
}


$id = $_SESSION['customer_id'];
$cart = $con->query("select * from cart where customer_id='$id'");


if (isset($_POST['submit'])) {
    $product_id    = $_POST['product_id'];
    $product_price   = $_POST['price'];
    $product_qty     = $_POST['qty'];
    $shop_id = $_POST['shop_id'];
    $date = date('Y-m-d');
    $sub = $_POST['amount'];
    $duration = $_POST['date'];
    $deliveryStatus = $_POST['isDelivered'];

    $r = $con->query("insert into orders(product_id,customer_id,shop_id,quantity,order_date,amount,duration,isDelivered) values('$product_id','$id','$shop_id','$product_qty','$date','$sub','$duration','$deliveryStatus') ");
    $order_id = $con->insert_id;

    $cart_info = $con->query("select * from cart where customer_id='$id'");
    
    while($info = $cart_info->fetch_object())
    {
       $p =$con->query("select * from product where product_id='$info->product_id'");
       $p1 = $p->fetch_object();
       $price = $p1->price;
       $qty = $info->quantity;
       $pid = $info->product_id;

        $exe =$con->query("insert into order_items(product_id,order_id,price,quantity) values('$pid','$order_id','$price','$qty')");
        if ($exe) 
        {
            $con->query("delete from cart where customer_id='$id'");
            echo "<script>alert('Order Sent SucessFully');document.location='index.php'</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong !!');document.location='index.php'</script>";
            // header('location:index.php');
        }
    }



    // if ($r) {
    //     $con->query("delete from cart where customer_id='$id'");
    //     echo "<script>alert('Order Sent Sucessfully');document.location='index.php'</script>";
    // } else {
    //     header('location:index.php');
    // }
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Order</title>

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
                    <li><i class="fas fa-angle-double-right"></i> My Order</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ######## Page  Title End ####### -->



    <div style="margin-top:0px;" class="row no-margin">
    </div>


    <form method="post">
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3 class="display-5 mb-2 text-center">My Orders</h3>
                        <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold"></i>
                        </p>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product</th>
                                    <th style="width:12%">Price</th>
                                    <th style="width:10%">Quantity</th>
                                    <th style="width:10%">Sub Total</th>
                                    <th style="width:8%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                while ($result = $cart->fetch_object()) {
                                    $x = $con->query("select * from product where product_id='$result->product_id'");
                                    $xx = $x->fetch_object();

                                    $amount = $result->price * $result->quantity;

                                    $total = $total + $amount;
                                ?>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-md-3 text-left">
                                                    <img height="500" width="300" src="../ADMIN/upload/<?php echo $xx->image; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                    <input type="hidden" id="price" name="price" value="<?php echo $result->price; ?>">
                                                    <input type="hidden" id="product_id" name="product_id" value="<?php echo $result->product_id; ?>">
                                                    <input type="hidden" id="shop_id" name="shop_id" value="<?php echo $xx->shop_id; ?>">
                                                </div>
                                                <div class="col-md-9 text-left mt-sm-2">
                                                    <h4><?php echo $xx->product_name; ?></h4>
                                                    <p class="font-weight-light"><?php echo $xx->description; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price"><?php echo $result->price; ?></td>
                                        <td data-th="Quantity">
                                            <input disabled="" type="text" id="qty" name="qty" class="form-control form-control-lg text-center" value="<?php echo $result->quantity; ?>">
                                            <input type="hidden" id="qty" name="qty" class="form-control form-control-lg text-center" value="<?php echo $result->quantity; ?>">
                                            <input type="hidden" id="isDelivered" name="isDelivered" value="0" min="0" max="1">
                                        </td>
                                        <td data-th="Price">
                                            <?php echo $amount; ?>

                                        </td>
                                        <td class="actions" data-th="">
                                            <div class="text-right">

                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                    <a href="delcart.php?dcid=<?php echo $result->id; ?>"><i class="fas fa-trash"></i></a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="float-right text-right">
                            <h4>Subtotal:</h4>
                            <h1><?php echo $total; ?> RS</h1>
                            <input type="hidden" id="amount" name="amount" value="<?php echo $total; ?>">
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-flex align-items-center">
                    <div class="col-sm-6 order-md-2 text-right">
                        <a href="catalog.html" class="mb-4 btn-lg pl-5 pr-5">Arival Date : <?php $Date = date('Y-m-d');
                                                                                            echo date('d-m-Y', strtotime($Date)); ?>
                            <input type="hidden" id="date" name="date" value="<?php $Date = date('Y-m-d');
                                                                                echo date('Y-m-d', strtotime($Date)); ?>">
                        </a>
                    </div>
                    <div class="col-sm-6 order-md-2 text-right">
                        <input type="submit" id="submit" name="submit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5" value="Place Order">
                    </div>
                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                        <a href="index.php">
                            <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </section>
    </form>
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

<script type="text/javascript">
    function updateQuantity(quantity, pid) {

        $.ajax({

            type: "POST",
            url: 'update_quantity.php',
            data: {
                quantity: quantity,
                product_id: pid
            },
            success: function(result) {

                document.location = 'cart.php';
            }
        });
    }
</script>

</html>