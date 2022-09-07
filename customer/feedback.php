<?php
session_start();
include 'common/connection.php';

if(!isset($_SESSION["customer_id"]))
{
	header("location:index.php");
}

$id = $_SESSION["customer_id"];


if (isset($_POST['submit'])) {
    
    $c_id = $_POST['customer_id'];
    $shop_id = $_POST['shop_id'];
    $rating = $_POST['rating'];
    $message = trim($con->real_escape_string($_POST["message"]));

    $exe = $con->query("INSERT INTO feedback(customer_id,shop_id,rating,message) VALUES('$c_id','$shop_id','$rating','$message')");
    // if ($exe) {
    //     echo "<script>alert('Data Inserted Sucsessfuly')</script>";
    // } else {
    //     echo "<script>alert('Something went wrong...')</script>";
    // }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Feedback</title>

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
                    <li><i class="fas fa-angle-double-right"></i> Feedback</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ######## Page  Title End ####### -->



    <!-- <div style="margin-top:0px;" class="row no-margin">

        <iframe style="width:100%" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d249759.19784092825!2d79.10145254589841!3d12.009924873581818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1448883859107" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


    </div> -->

    <div class="row contact-rooo no-margin">
        <div class="container">
            <div class="row">


                <div style="padding:20px" class="col-sm-6">
                    <h2 style="margin-bottom:40px">Feedback</h2>
                    <form method="post">

                        <div style="margin-top:10px;" class="row">
                            <input type="hidden" name="customer_id" value="<?php echo $id ?>">
                        </div>
                        <div style="margin-top:10px;" class="row">
                            <div style="padding-top:10px;" class="col-sm-3"><label>Select Shop :</label></div>
                            <select style="margin-left:15px;border: 1px solid #ced4da;border-radius:5px;background-color: #F8F8F8;" name="shop_id" required>
                                <?php
                                    $result = $con -> query("SELECT * from shop");

                                    while($row = $result -> fetch_object()){
                                ?>
                                <option value="<?php echo $row -> shop_id ?>"><?php echo $row -> shop_name ?></option>
                                <?php } ?>
                            </select>    
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div style="padding-top:10px;" class="col-sm-3"><label>Enter Rating :</label></div>
                            <div class="col-sm-8"><input type="number" min="1" max="5" placeholder="Enter value out of 5" id="name" name="rating" class="form-control input-sm" required></div>
                        </div>

                        <div style="margin-top:10px;" class="row">
                            <div style="padding-top:10px;" class="col-sm-3"><label>Enter Message:</label></div>
                            <div class="col-sm-8">
                                <textarea rows="5" id="message" name="message" placeholder="Enter Your Message" class="form-control input-sm" required></textarea>
                            </div>
                        </div>
                        <div style="margin-top:10px;" class="row">
                            <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                            <div class="col-sm-8">
                                <button id="submit" name="submit" class="btn btn-danger btn-sm">Give Feedback</button>
                            </div>
                            <div class="col-sm-8">
                                <br>
                            <?php
                            if(isset($_POST['submit'])){
                                if($exe){
                                    echo '<div class="alert alert-success text-center" role="alert">Your Response is Submitted!!</div>';
                                } else{
                                    echo '<div class="alert alert-danger text-center" role="alert">Something Went Wrong !!</div>';
                                }
                            }
                            ?>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">

                </div>

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