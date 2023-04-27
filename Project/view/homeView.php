<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/logo.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Quicksand";
        }

        body {
            min-width: 50vh;
        }

        html,
        body {
            height: 100%;
            color: #fff;
            overflow-x: hidden;
        }

        .container {
            /* display: grid;
            position: relative;
            top: 145px;
            padding: 0 40px 0 40px;
            margin: 0 50px 0 50px;
            column-gap: 20px;
            row-gap: 20px;
            z-index: -2; */
            max-width: 500px;
            margin: 0 auto;
        }

        .container>div {
            background-color: black;
            padding: 5px 0 10px 0;
            text-align: center;
            font-size: 30px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 1px 2.4px 1.4px rgba(0, 0, 0, 0.125);
        }

        .salonImageClass img{
            display: block;
            max-width: 100;
            height: auto;
            
            /* grid-column: 2 / span 20;
            grid-row: 1 / span 40; */
        }

        .salonImageClass {
            width: 100%;
        }


        .image-container{
            width: 100%;
            height: 70vh;
            margin-top: 50px;
            position: relative;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .grey-div {
            width: 100%;
            height: 200px;
            background-color: #f2f2f2;
            position: relative;
            top: 50px;
            z-index: -1;
        }

        .grey-div h1{
           
        }

        .footer {
            width: 100%;
            height: 200px;
            background-color: #000000;
            position: relative;
            top: 50px;
            z-index: -1;
        }

        /* body {
            margin: 0;
            padding: 0;
        } */

    </style>
    <title>Home</title>
</head>

<body>
    <!------------------------------------------------------||LOGO||------------------------------------------------------------>
    <div class="top-left">
        <p>LOGO</p>
    </div>
    <div class="top-right">
        <p>Login</p>
    </div>
    <!------------------------------------------------------||LOGO||------------------------------------------------------------>

    <!------------------------------------------------------||NAVBAR||------------------------------------------------------------>
    <nav>
        <ul>
            <li><a href="?resource=home&action=view">Home</a></li>
            <li><a href="?resource=product&action=manage">Shop</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">Location</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>
    <!------------------------------------------------------||HomePageImage||------------------------------------------------------------>

    <div class="image-container">
            <img src="img/homePageSalon.jpg">
    </div>

    <!------------------------------------------------------||HomePage||------------------------------------------------------------>

    <div class="grey-div">
        <h1>Our Services </h1>
    </div>

     <!------------------------------------------------------||Footer||------------------------------------------------------------>

     <div class="footer">
    </div>


</body>

</html>