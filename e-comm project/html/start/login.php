<?php
$uname=$_GET['uname'];
$upass=$_GET['upass'];

if($uname="rutuja" && $upass="pass")
{
    header('Location:login.php');
}
else{
    echo"<h1>Invalid password</h1>";
}

?>