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

        .productCategory {
            border: none;
            cursor: pointer;
            font-size: 15pt;
            padding: 10px;
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
        <a href="?resource=home&action=view" class="logo">LOGO</a>
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
            <li><a href="?resource=reservation&action=view">Appointment</a></li>
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

                if(isset($_GET['search'])) {
                    $products = $product->getProduct($_GET['search']);
                    foreach ($products as $e) {
                        $html =
                            "<div class=image-container>"
                            . "<img class = 'product-image' src='img/productImages/" . $e['image'] . "'>" . "</br>" . $e['name'] . "</br>" . "<div class = price>" . $e['price'] . "$" . "</div>" .
                            "</div>";
                        echo $html;
                    }
                } else if(isset($_GET['category'])) {
                    $products = $product->getCategoryProduct($_GET['category']);
                    foreach ($products as $e) {
                        $html =
                            "<div class=image-container>"
                            . "<img class = 'product-image' src='img/productImages/" . $e['image'] . "'>" . "</br>" . $e['name'] . "</br>" . "<div class = price>" . $e['price'] . "$" . "</div>" .
                            "</div>";
                        echo $html;
                    }
                } else {
                    $products = $product->getAll();
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
            <form method="GET">
                <input type="hidden" name="resource" value="product">
                <input type="hidden" name="action" value="view">
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
                    "<form id='form' method='GET'>
                    <input type='hidden' name='resource' value='product'>
                    <input type='hidden' name='action' value='view'>
                    <input type='submit' name='category' class = 'productCategory' value='" . $e['category'] . "'>
                    </form>";
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
                        <li><a href="?resource=reservation&action=view">Appointments</a></li>
                        <li><a href="?resource=location&action=view">Location</a></li>
                        <li><a href="?resource=about&action=view">About</a></li>
                    </ul>
                </div>
                <div class="col"></div>
                <div class="col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.440082417717!2d-73.67620018255616!3d45.521348899999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91842b35a9495%3A0xe97488b9f56c5753!2s685%20Boulevard%20Cote%20Vertu%20Ouest%2C%20Saint-Laurent%2C%20QC%20H4L%201Y2!5e0!3m2!1sen!2sca!4v1683814730060!5m2!1sen!2sca"
                        width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
</body>

</html>