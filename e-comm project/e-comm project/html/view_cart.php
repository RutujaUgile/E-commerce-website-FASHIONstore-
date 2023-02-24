<html>
<style>
    body{
        background-image: url(bg_home.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .product {
        width: 240px;
        height: 280px;
        border: 2px solid black;
        margin: 10px;
        margin-top: 130px;
        position: relative;
        padding: 10px;
        background-color: lightblue;
        border-radius: 50px;
       
    }
    body{
        display: flex;
        flex-wrap: wrap;
    }
    .name {
        font-size: 20px;
        margin: 3px;
        padding: 2px;
        font-weight: bold;
    }

    .image {
        width: 200px;
        height: 150px;
        border-radius: 7px;
    }
    .head{
        position: absolute;
        left: 500px;
        font-size: 50px;
        top: 0;
        color: #491b6a;
    }
    .logo{
        position: absolute;
        top: 0;
        left: 400px;
        width: 170px;
        height: 125px;
        border-radius: 50%;
        
    }
    .head-2{
        position: absolute;
        left: 4px;
        font-size: 40px;
        top: 0;
    }
    .top-1{
        box-shadow: 5px 5px 5px lightblue inset;
        width: 1200px;
        height: 50px;
        /* border: 2px solid black; */
        position: absolute;
        display : flex;
        flex-direction : row;
        font-weight: bold;
    }
    .btn-1{
        margin : 13px 25px;
    }
    .btn-2{
        margin: 13px 25px;
    }
    .btn-3{
        margin: 13px 25px;
        color: #491b6a;
    }
    a{
        text-decoration: none;
    }
</style>

<body>
<div class="top-1">
        <a href="view_client.php">
            <div class="btn-1">View Product</div>
        </a>

        <a href="view_cart.php">
            <div class="btn-2">View Cart</div>
        </a>

        <a href="logout.php">
            <div class="btn-3">Logout</div>
        </a>

    </div>
    <img src="logo_origin.png" alt="" class="logo">
<h1 class="head">FASHIONstore</h1>
<h2 class="head-2">My Cart</h2>
</body>

</html>

<?php

//for Connection
$conn = new mysqli("localhost", "root", "", "acme_sep");

if ($conn->connect_error) {
    echo "failed";
    die;
}

session_start();
$uid = $_SESSION['userid'];

$sql_result = mysqli_query($conn, "select * from cart join products on cart.pd_id=products.pd_id where client_id='$uid'");

$row = mysqli_fetch_assoc($sql_result);

while ($row = mysqli_fetch_assoc($sql_result)) {
    $pd_id = $row['pd_id'];
    $name = $row['name'];
    $price = $row['price'];
    $img_path = $row['img_path'];
    $details = $row['details'];
    $cartid = $row['cart_id'];



    echo "
   
     <div class='product'>
         <div class='name'>$name</div>
         <div class='price'>$price</div>
        <img class='image' src='$img_path'>
        <div class='details'>$details</div>

    
    <div class='action'>
      <button class='action-edit'>Edit</button>
      <a href='delete_cart.php?cart_id=$cartid'>
        <button class='action-delete'>Remove from cart</button>
      </a>
    </div>
    
    </div>
    
    ";
}
?>