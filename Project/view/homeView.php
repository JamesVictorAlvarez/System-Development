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
            <li><a href="#">Location</a></li>
            <li><a href="?resource=about&action=view">About</a></li>
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