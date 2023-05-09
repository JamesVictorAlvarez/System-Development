<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/logo.css">
    <link rel="stylesheet" href="style/footer.css">
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
            top: 125px;
            padding: 0 40px 0 40px;
            margin: 0 50px 0 50px;
            column-gap: 20px;
            row-gap: 20px;
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
            grid-row: 1 / span 30;
        }

        .item1 p {
            text-align: left;
            color: black;
            margin: 15px;
            padding: 10px;
        }

        .item2 {
            grid-column: 1;
            grid-row: 2;
        }

        .item3 {
            grid-column: 1;
            grid-row: 3;
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
            cursor: pointer;
        }

        .shop-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }

        .product-image {
            width: 270px;
            height: 270px;
        }

        .image-container {
            color: black;
            font-size: 20px;
        }

        .price {
            color: gray;
            font-size: 16px;
            padding-bottom: 20px;
        }

        .category {
            color: black;
            font-size: 24px;
            padding-top: 15px;
            padding-bottom: 15px;
            cursor: pointer;
            z-index: 5;
        }

        .category:hover {
            text-decoration: black underline;
        }
    </style>
    <script>
        function submit() {
            let form = document.getElementById("form");
            form.submit();
        }
    </script>
    <title>Home</title>
</head>

<body>
    <!------------------------------------------------------||LOGO||------------------------------------------------------------>
    <div class="top-left">
        <p class="logo">LOGO</p>
    </div>
    <div class="top-right">
        <p class="login"><a href="?resource=user&action=login">Login</a></p>
    </div>
    <!------------------------------------------------------||LOGO||------------------------------------------------------------>

    <!------------------------------------------------------||NAVBAR||------------------------------------------------------------>
    <nav>
        <ul>
            <li><a href="?resource=home&action=view">Home</a></li>
            <li><a href="?resource=product&action=view">Shop</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="?resource=location&action=view">Location</a></li>
            <li><a href="?resource=about&action=view">About</a></li>
        </ul>
    </nav>
    <!------------------------------------------------------||NAVBAR||------------------------------------------------------------>

    <div class="container">

        <!------------------------------------------------------||BODY||------------------------------------------------------------>
        <div class="item1">
            <p>Shop our products</p>
            <div class="shop-container" id="products">
                <?php
                $product = new product();

                $products = $product->getAll();

                foreach ($products as $e) {
                    $html =
                        "<div class=image-container>"
                        . "<img class = 'product-image' src='img/productImages/" . $e['image'] . "'>" . "</br>" . $e['name'] . "</br>" . "<div class = price>" . $e['price'] . "$" . "</div>" .
                        "</div>";
                    echo $html;
                }

                if (isset($_POST['Hair Products'])) {
                    $product = new product();
                    echo ('hello');

                    $products = $product->getProduct('Hair Products');

                    foreach ($products as $e) {
                        $html =
                            "<div class=image-container>"
                            . "<img class = 'product-image' src='img/productImages/" . $e['image'] . "'>" . "</br>" . $e['name'] . "</br>" . "<div class = price>" . $e['price'] . "$" . "</div>" .
                            "</div>";
                        echo $html;
                    }
                }
                ?>
            </div>
        </div>
        <!------------------------------------------------------||BODY||------------------------------------------------------------>

        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>
        <div class="item2">
            <form>
                <input type="search" id="search-input" name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <!------------------------------------------------------||SEARCH||------------------------------------------------------------>

        <div class="item3">
            <?php
            $product = new product();

            $products = $product->getCategory();

            foreach ($products as $e) {
                $html =
                    "<form id='form' method='post'><div class = category onclick=submit()>
                    " . $e['category'] . "
                    <input type='hidden' name='" . $e['category'] . "'>
                    </div></form>";
                echo $html;
            }
            ?>
        </div>
    </div>

    <footer>
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h2>Cherry Salon</h2>
                    <ul>
                        <li>685 Bd de la Cote Vertu Ouest</li>
                        <li> Saint-Laurent, QC</li>
                        <li>H4L 1Y2</li>
                    </ul>
                </div>
                <div class="col">
                    <h2>Hours</h2>
                    <ul>
                        <li>Mon: Closed</li>
                        <li>Tue: 10:00 AM - 7:00 PM</li>
                        <li>Wed: 10:00 AM - 7:00 PM</li>
                        <li>Thu: 10:00 AM - 7:00 PM</li>
                        <li>Fri: 10:00 AM - 7:00 PM</li>
                        <li>Sat: 10:00 AM - 7:00 PM</li>
                        <li>Sun: 10:00 AM - 7:00 PM</li>
                    </ul>
                </div>
                <div class="col">
                    <h2>Explore</h2>
                    <ul>
                        <li><a href="?resource=home&action=view">Home</a></li>
                        <li><a href="?resource=product&action=view">Shop</a></li>
                        <li><a>Appointments</a></li>
                        <li><a>Location</a></li>
                        <li><a href="?resource=about&action=view">About</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h2>Resources</h2>
                    <ul>
                        <li>Webmail</li>
                        <li>Web templates</li>
                        <li>Email templates</li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
</body>

</html>