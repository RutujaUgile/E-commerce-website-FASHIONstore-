<?php

//for connection
$conn=new mysqli("localhost","root","","acme_sep");

if($conn->connect_error){
    echo "failed";
    die;
}

session_start();
$_SESSION['login_status']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass'];

$sql_result=mysqli_query($conn,"select * from client where userid='$uname' and new_pass='$upass'");
$total_rows=mysqli_num_rows($sql_result);

if($total_rows==0){
    echo "<h2>Account not found</h2> <br> <h2>create new account</h2>";
    die;
}

$row=mysqli_fetch_assoc($sql_result);
print_r($row);

echo "<br> login success";
$_SESSION['login_status']=true;
$_SESSION['userid']=$row['userid'];
$_SESSION['email']=$row['email'];
header("Location:view_client.php");

?>

