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
            display: grid;
            position: relative;
            top: 145px;
            padding: 0 40px 0 40px;
            margin: 0 50px 0 50px;
            column-gap: 20px;
            row-gap: 20px;
            z-index: -2;
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

        .item1 {
            grid-column: 2 / span 20;
            grid-row: 1 / span 40;
            color: black;
        }

        .item2 {
            grid-column: 1;
            grid-row: 2;
        }

        .item3 {
            grid-column: 1;
            grid-row: 3;
            color: black;
        }

        input[type="search"] {
            font-size: 14px;
            padding: 5px;
            border: 2px solid black;
            border-radius: 2px;
            width: 150px;
            background-color: #fff;

        }

        button[type="submit"] {
            font-size: 14px;
            padding: 5px;
            border: 2px solid black;
            border-radius: 2px;
            width: 70px;
            background-color: black;
            color: #fff;

        }

        .shop-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }

        .shop-container div {
            background-color: grey;
            margin: 40px;
            padding-top: 200px;
            border-radius: 2px;
        }
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
            <li><a href="?resource=product&action=view">Shop</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">Location</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>
    <!------------------------------------------------------||NAVBAR||------------------------------------------------------------>

    <div class="container">

        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>
        <div class="item1">
            Shop
            <div class="shop-container">
                <?php

                $product = new product();

                $products = $product->getAll();

                foreach ($products as $e) {
                    $html = "<div>
                    " . $e['name'] . "
                    </div>";


                    echo $html;
                }

                ?>
            </div>
        </div>
        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>

        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>
        <div class="item2">
            <form>
                <input type="search" id="search-input" name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>

        <div class="item3">
            Category
        </div>
    </div>


</body>

</html>