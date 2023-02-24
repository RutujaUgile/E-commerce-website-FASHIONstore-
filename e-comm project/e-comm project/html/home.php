<?php
session_start();

if($_SESSION['login_status']==false){
    echo "<h1>login first</h1>";
    die;
}

echo "<h2>yohho succefully logged in</h2>";
?>