<?php

$cartid = $_GET['cart_id'];

//for Connection
$conn = new mysqli("localhost", "root", "", "acme_sep");

if ($conn->connect_error) {
    echo "failed";
    die;
}

$sql_status = mysqli_query($conn, "delete from cart where cart_id=$cartid");
if($sql_status){
    echo "Cart item removed";
    header('location:view_cart.php');
}
else{
    echo "failed to remove";
}
?>