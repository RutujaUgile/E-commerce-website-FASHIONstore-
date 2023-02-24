<?php
session_start();
if (!isset($_SESSION['login_status'])) {
    echo "illegal attempt";
    die;
}
if ($_SESSION['login_status'] == false) {
    echo "login failed";
    die;
}

//to get user's name
$userid = $_SESSION['user_id'];
echo "<h1 class='head-1'> Welcome $userid...</h1>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-image: url(bg_for_upload.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        input {
            display: block;
            margin: 5px;
        }

        .head-1 {
            margin-left: 450px;
            letter-spacing: 2px;
            text-decoration: underline;
            font-family: 'Alegreya Sans SC', sans-serif;

        }

        .head-2 {
            text-align: center;
            font-family: 'Alegreya Sans SC', sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        input {
            width: 300px;
            margin-left: 450px;
        }

        p {
            margin-left: 450px;
        }

        textarea {
            margin-left: 450px;
            width: 350px;
        }
    </style>
</head>

<body>
    <!-- <h1>upload works</h1> -->
    <h1 class="head-2">Enter your product details..</h1>

    <form action="upload_pd.php" method="post" enctype="multipart/form-data">
        <p>*Name of the Product</p>
        <input type="text" name="pd_name" placeholder="Name">

        <p>*Enter price</p>
        <input type="text" name="price" placeholder="price">

        <p>*Decription about your product</p>
        <textarea name="details" cols="30" rows="10"></textarea>

        <p>*Add photo of your products..</p>
        <input type="file" name="pd_img" accept=".jpg">

        <input type="submit">
    </form>
</body>

</html>