<?php 

    session_start();
    include "comman/connection.php";

    $user_id = $_SESSION["customer_id"];
    $product_id = $_POST["p_id"];

    // echo "SELECT * from likes where user_id='$user_id' and post_id='$post_id'";
    // exit;

    $result = $obj->query("SELECT * from cart where customer_id='$user_id' and product_id='$product_id'");
    $rowcount = $result->num_rows;
    

    if($rowcount == 1)
    {
        // $table_user = $result->fetch_object();
        // $user_like = $table_user->user_like;
        // $user_like = ($user_like == 0) ? 1 : 0;
   
        // echo mysqli_error($conn);
        $exes = $obj->query("UPDATE cart SET quantity=1 WHERE user_id='$user_id' and post_id='$post_id'");
        if($exes)
        {
            echo "<script>alert('Your like updated successfully');</script>";
            // $delete_dislike = $conn->query("DELETE FROM likes WHERE user_dislike = 1");
        }
        else
        {
            echo "<script>alert('Error');</script>";
        }
    }
    else
    {
        // echo "INSERT INTO likes(user_id,post_id,user_like,user_dislike) VALUES('$user_id','$post_id',1,0)";
        // exit;
            // echo mysqli_error($conn);
        $exe = $obj->query("INSERT INTO likes(user_id,post_id,user_like,user_dislike) VALUES('$user_id','$post_id',1,0)");
        if($exe)
        {

            echo "<script>alert('Your like added successfully');</script>";
                // $delete_dislike = $conn->query("DELETE FROM likes WHERE user_dislike = 1");
        }
    }
?>