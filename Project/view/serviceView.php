<title> Service Page</title>
<h2> Service Page</h2>
<head>
    <base href="/system-development/Project/"
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

        .container>div {
            background-color: black;
            padding: 5px 0 10px 0;
            text-align: center;
            font-size: 30px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 1px 2.4px 1.4px rgba(0, 0, 0, 0.125);
        }

        </style>
</head>

<!------------------------------------------------------||LOGO||------------------------------------------------------------>
<div class="top-left">
    <a href="home/view" class="logo">LOGO</a>
</div>
<div class="top-right">
    <p class="login"><a href="user/login">Login</a></p>
</div>
<!------------------------------------------------------||LOGO||------------------------------------------------------------>

<!------------------------------------------------------||NAVBAR||------------------------------------------------------------>
<nav>
    <ul>
        <li><a href="home/view">Home</a></li>
        <li><a href="product/view">Shop</a></li>
        <li><a href="reservation/view">Appointment</a></li>
        <li><a href="location/view">Location</a></li>
        <li><a href="about/view">About</a></li>
    </ul>
</nav>

<!------------------------------------------------------||HomePageImage||------------------------------------------------------------>

<div class="image-container">
    <div class="cherry-salon">
        <div class="rectangle">
            <h1 class="cherry-salon-text">Cherry Salon</h1>
            <p class="we-offer-services-text">Welcome to our salon, where we believe that everyone deserves to look and feel their best.</p>
            <button class="book-now-button" onclick="window.location.href='reservation/view'">Book Now</button>
        </div>
    </div>
    <img src="img/homePageSalon.jpg">
</div>

    <br>
    </br>
    <br> </br>
</body>

<?php
use model\Service;

    $service = new Service();

    if (isset($_GET['submit']))
        $service->updateRow($_GET["service_name"], $_GET["count"]);

    $services = $service->getAll();

    $html = '<table border=1 id="servicestable">';

    $html .= "<th> ID </th>
          <th> Service Name </th>";

          

    foreach ($services as $e) {
        $html .= '<tr>';
        $html .= '<td>' . $e['ID'] . '</td>';
        $html .= '<td>' . $e['service_name'] . '</td>';
        $html .= '<td><a href="service/edit?row=' . $e['ID'] . '"> Edit</a></td>';
        $html .= '<td><a href="service/remove?row=' . $e['ID'] . '"> Remove</a></td>';
        
        $html .= '</tr>';
    }
    $html .= "</table>";
    

    echo $html;

    

?>
<button onclick="location.href='service/add'">Add</button>

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
                    <li><a href="home/view">Home</a></li>
                    <li><a href="product/view">Shop</a></li>
                    <li><a href="reservation/view">Appointments</a></li>
                    <li><a href="location/view">Location</a></li>
                    <li><a href="about/view">About</a></li>
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