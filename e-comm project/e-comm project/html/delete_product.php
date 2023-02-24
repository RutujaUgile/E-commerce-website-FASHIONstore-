<?php
//for Connection
$conn=new mysqli("localhost","root","","acme_sep");

if($conn->connect_error){
    echo "failed";
    die;
}
$id=$_GET['pd_id'];
$cmd="delete from products where pd_id=$id";
$sql_status=mysqli_query($conn,$cmd);

if($sql_status){
    
    echo "deleted ";
    header("Location:view.php");
}
else{
    echo "failed to delete";
}
?>