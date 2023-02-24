<?php
use function CommonMark\Render\HTML;

$name = $_POST['pd_name'];
$price = $_POST['price'];
$details = $_POST['details'];

$actual_name = $_FILES['pd_img']['name'];

$file_name = "../images/$actual_name";

move_uploaded_file($_FILES['pd_img']['tmp_name'], $file_name);

//for Connection
$conn = new mysqli("localhost", "root", "", "acme_sep");

if ($conn->connect_error) {
    echo "failed";
    die;
}

$cmd = "insert into products(name,price,details,img_path) values('$name',$price,'$details','$file_name')";

$sql_status = mysqli_query($conn, $cmd);

if ($sql_status) {
    echo "<h1 class='head'>Successfully Uploaded</h1>";
} else {
    echo "failed";
}
?>

<html>
<style>
    .head {
        margin-left: 450px;
    }

    * {
        padding: 0;
        margin: 0
    }

    .wrapper {
        position: relative;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #eee
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }

    .checkmark {
        width: 62px;
        height: 60px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }
    .btn{
        position: absolute;
        width: 100px;
        height: 40px;
        left: 1100px;
        top: 500px;
        background-color: aqua;
        color: black;
    }
</style>

<body>
    <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
    </div>
   <a href="view.php" ><button class="btn">View</button></a>
</body>

</html>