<?php
 $userid=$_POST['userid'];
 $email=$_POST['email'];
 $pass1=$_POST['new_pass'];
 $pass2=$_POST['pass2'];
$conn=new mysqli("localhost","root","","acme_sep");

if($conn->connect_error){
    echo "failed";
    die;
}
$sql_result=mysqli_query($conn,"select * from client where userid='$userid'");
$total_rows=mysqli_num_rows($sql_result);

if($total_rows>0){
    echo "<h3>Userid already exist please try different id</h3>";
    die;
}

$cmd="insert into client(userid,email,new_pass) values('$userid','$email','$pass1')";
$query_status=mysqli_query($conn,$cmd);


if($query_status){
    echo "Registered Successfully.";
    echo "<a href='2ndpage(1).html'>Login here</a>";
}
else{
    echo "nhi jhal";
}
?>