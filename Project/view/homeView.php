<?php
  if (isset($_GET['status'])) {
    $user = new \model\User();

        if(isset($_COOKIE)){
            if(isset($_COOKIE['user'])){

                $username = $_COOKIE['user'];

                $user = $user->getUserByUsername($username)[0];

            }
        }

    $user->logout();
  }

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

        .salonImageClass img {
            display: block;
            max-width: 100;
            height: auto;

            /* grid-column: 2 / span 20;
            grid-row: 1 / span 40; */
        }

        .salonImageClass {
            width: 100%;
        }


        .image-container {
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

        hr.solid {
            position: relative;
            top: 30px;
            margin: 10px;
            border-top: 5px solid black;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        a {
            text-decoration-line: none;
            text-decoration-thickness: initial;
            text-decoration-style: initial;
            text-decoration-color: initial;
        }

        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            line-height: 25px;
        }

        .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 30px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px 50px 10px 50px;
        }

        .mainImg {
            color: black;
            width: 50%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .text-blk.headingText {
            font-size: 22px;
            font-weight: 700;
            line-height: 30px;
            color: #FF0063;
            padding-top: 0px;
            padding-right: 10px;
            padding-bottom: 0px;
            padding-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
        }

        .allText {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            width: 40%;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .text-blk.subHeadingText {
            color: rgb(102, 102, 102);
            font-size: 26px;
            line-height: 32px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 15px;
            margin-left: 0px;
            padding-top: 0px;
            padding-right: 10px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .text-blk.description {
            font-size: 18px;
            line-height: 26px;
            color: rgb(102, 102, 102);
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
            font-weight: 400;
            padding-top: 0px;
            padding-right: 10px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .explore {
            font-size: 16px;
            line-height: 28px;
            color: rgb(102, 102, 102);
            border-top-width: 2px;
            border-right-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 2px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: rgb(102, 102, 102);
            border-right-color: rgb(102, 102, 102);
            border-bottom-color: rgb(102, 102, 102);
            border-left-color: rgb(102, 102, 102);
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            cursor: pointer;
            background-color: white;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            padding-top: 8px;
            padding-right: 40px;
            padding-bottom: 8px;
            padding-left: 40px;
        }


        .responsive-container-block.Container {
            margin-top: 80px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
            justify-content: center;
            align-items: center;
            max-width: 1320px;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
        }

        .responsive-container-block.Container.bottomContainer {
            flex-direction: row-reverse;
            margin-top: 80px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
            position: static;
        }

        .allText.aboveText {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 40px;
        }

        .allText.bottomText {
            margin-top: 0px;
            margin-right: 40px;
            margin-bottom: 0px;
            margin-left: 0px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding-top: 0px;
            padding-right: 15px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .purpleBox {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 430px;
            background-color: rgb(176, 98, 255);
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            bottom: -35px;
            left: -8%;
        }

        .purpleText {
            font-size: 18px;
            line-height: 26px;
            color: white;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

        .ultimateImg {
            width: 50%;
            position: relative;
        }

        @media (max-width: 500px) {
            .responsive-container-block.Container {
                padding-top: 10px;
                padding-right: 0px;
                padding-bottom: 10px;
                padding-left: 0px;
                width: 100%;
                max-width: 100%;
            }

            .mainImg {
                width: 25%;
            }

            .responsive-container-block.bigContainer {
                padding-top: 10px;
                padding-right: 25px;
                padding-bottom: 10px;
                padding-left: 25px;
            }

            .text-blk.subHeadingText {
                font-size: 24px;
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                line-height: 28px;
            }

            .text-blk.description {
                font-size: 16px;
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                line-height: 22px;
            }

            .allText {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                width: 100%;
            }

            .allText.bottomText {
                margin-top: 50px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
                padding: 0 0 0 0;
                margin: 30px 0 0 0;
            }

            .ultimateImg {
                position: static;
            }

            .purpleBox {
                position: static;
            }

            .stars {
                width: 55%;
            }

            .allText.bottomText {
                margin-top: 75px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .responsive-container-block.bigContainer {
                padding-top: 10px;
                padding-right: 20px;
                padding-bottom: 10px;
                padding-left: 20px;
            }

            .purpleText {
                font-size: 16px;
                line-height: 22px;
            }

            .explore {
                padding: 6px 35px 6px 35px;
                font-size: 15px;
            }
        }

        .image-container {
  position: relative;
  width: 100%;
  height: 500px;
}

.cherry-salon {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.rectangle {
  width: 300px;
  height: 200px;
  background-color: white;
  border: 2px solid black;
  text-align: center;
  padding: 20px;
}

.cherry-salon-text {
  font-size: 36px;
  color: black;
}

.we-offer-services-text {
  font-size: 16px;
  color: black;
}

.book-now-button {
  background-color: black;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 18px;
  margin-top: 20px;
  cursor: pointer;
  border-radius: 10px 10px 10px 10px;

}

.image-container {
  display: flex;
  justify-content: center;
}

.service-container {
  width: 25%;
  padding: 10px;
}

.service-image {
  position: relative;
}

.service-name {
  position: absolute;
  bottom: 0;
  left: 15%; /* Aligns with the left edge of the image */
  width: 70%; /* Same width as the image */
  background-color: black;
  color: white;
  text-align: center;
  font-size: 20px;
  padding: 15px 0;
  border-radius: 0 0 10px 10px;
}

.service-image img {
  display: block;
  margin: 0 auto;
  width: 70%; /* Change to 100% to have the same width as the black section */
  height: 400px;
  object-fit: cover;
  border-radius: 10px;
}

.services-title {
  font-size: 50px;
  text-align: center;
  margin-top: 50px;
  color: black;

}

.view-all-services-button {
  display: flex;
  justify-content: center;
  margin-top: 60px;
}

.black-button {
  background-color: black;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.white-text {
  color: white;
}



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
            <li><a href="?resource=location&action=view">Location</a></li>
            <li><a href="?resource=about&action=view">About</a></li>
        </ul>
    </nav>

    <!------------------------------------------------------||HomePageImage||------------------------------------------------------------>

    <div class="image-container">
  <div class="cherry-salon">
    <div class="rectangle">
      <h1 class="cherry-salon-text">Cherry Salon</h1>
      <p class="we-offer-services-text">Welcome to our salon, where we believe that everyone deserves to look and feel their best.</p>
      <button class="book-now-button" onclick="window.location.href='?resource=?&action=?'">Book Now</button>
    </div>
  </div>
  <img src="img/homePageSalon.jpg">
</div>

    <hr class="solid">
    <!------------------------------------------------------||HomePageService||------------------------------------------------------------>
    
    <h2 class="services-title">Our Services</h2>

<div class="image-container">
  <?php
    require_once(dirname(__DIR__) . "/model/Service.php");

    $service = new Service();
    $services = $service->getAll(); // Get all services from the database
    
    foreach ($services as $s) {
      $html = 
      "<div class='service-container'>
          <div class='service-image'>
              <img src='img/serviceImages/" . $s['service_image'] . "'>
              <div class='service-name'>" . $s['service_name'] . "</div>
          </div>
      </div>";
      echo $html;
    }
  ?>
</div>

<div class="arrow-container">
  <div class="arrow"></div>
</div>



    <!------------------------------------------------------||HomePage||------------------------------------------------------------>

    <hr class="solid">

    <!------------------------------------------------------||Footer||------------------------------------------------------------>

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


</body>

</html>