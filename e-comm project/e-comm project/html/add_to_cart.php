<html>
    <style>
        body{
            background-image: url(bgforcart.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .head{
            text-align: center;
            margin-top: 100px;
        }
    </style>
    <body>
        
    </body>
</html>

<?php
session_start();

$uid = $_SESSION['userid'];
$id = $_GET['pd_id'];

$conn = new mysqli("localhost", "root", "", "acme_sep");

if ($conn->connect_error) {
    echo "failed";
    die;
}

$sql_result = mysqli_query($conn, "select * from cart where client_id='$uid' and pd_id='$id'");
$total_row = mysqli_num_rows($sql_result);
if($total_row){
    echo "<h1 class='head'>Product already added to cart</h1>";
    die;
}

$cmd = "insert into cart(client_id,pd_id) values('$uid','$id')";
$sql_status = mysqli_query($conn, $cmd);

if($sql_status){
    echo "Added to cart";
}
else{
    echo "failed to add";
}
?>