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
    .btn{
        position: absolute;
        left: 1100px;
        width: 100px;
        height: 40px;
        background-color: lightblue;
        border-radius: 15px;
        font-size: 15px;
        font-weight: bold;
    }
</style>

<body>
    <img src="logo_origin.png" alt="" class="logo">
<h1 class="head">FASHIONstore</h1>
<a href="2ndpage(1).html"><button class="btn">Back To Login</button></a>
</body>

</html>

<?php
$conn = new mysqli("localhost", "root", "", "acme_sep");

if ($conn->connect_error) {
    echo "failed";
    die;
}

$cmd = "select * from products";

$sql_result = mysqli_query($conn, $cmd);

while ($row = mysqli_fetch_assoc($sql_result)) {
    $pd_id = $row['pd_id'];
    $name = $row['name'];
    $price = $row['price'];
    $img_path = $row['img_path'];
    $details = $row['details'];



    echo "
   
     <div class='product'>
         <div class='name'>$name</div>
         <div class='price'>$price</div>
        <img class='image' src='$img_path'>
        <div class='details'>$details</div>

    
    <div class='action'>
      <button class='action-edit'>Edit</button>
      <a href='delete_product.php?pd_id=$pd_id'>
        <button class='action-delete'>Delete</button>
      </a>
    </div>
    
    </div>
    
    ";
}
?>