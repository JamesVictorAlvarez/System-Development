<title> Service Page</title>

<head>
    <base href="/system-development/Project/"
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="style/productDesign.css">
    <link rel="stylesheet" href="style/sidebar.css">


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



<?php

use model\Reservation;

$reservation = new Reservation();

if (isset($_GET['submit']))
    $reservation->updateRow($_GET["id"], $_GET["service_id"], $_GET["first_name"], $_GET["last_name"], $_GET["date"], $_GET["time"]);

$reservations = $reservation->getAll();

$html = '<table border=1 id="reservationtable">';

$html .= "<th> ID </th>
          <th> Service Requested </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Reservation Date </th>
          <th> Reservation Time </th>";

foreach ($reservations as $e) {
    $html .= '<tr>';
    $html .= '<td>' . $e['id'] . '</td>';
    $html .= '<td>' . $e['request_id'] . '</td>';
    $html .= '<td>' . $e['first_name'] . '</td>';
    $html .= '<td>' . $e['last_name'] . '</td>';
    $html .= '<td>' . $e['date'] . '</td>';
    $html .= '<td>' . $e['time'] . '</td>';
    $html .= '<td><a href="reservation/edit?row=' . $e['id'] . '"> Edit</a></td>';
    $html .= '<td><a href="reservation/remove?row=' . $e['id'] . '"> Remove</a></td>';
    $html .= '</tr>';
}

// Add the button row at the bottom
$html .= '<tr><td colspan="4" class="add_div"><button onclick="location.href=\'reservation/add\'">Add</button></td></tr>';

$html .= "</table>";

echo $html;
?>


<!-- <div class="add_div">
<button onclick="location.href='?resource=service&action=add'">Add</button> -->
<nav class="main-menu">
    <ul>
        <li>
            <a href="?resource=reservation&action=manage">
                <i class="fa fa-calendar fa-2x"></i>
                <span class="nav-text">
                        Reservation
                    </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="?resource=product&action=manage">
                <i class="fa fa-shopping-cart fa-2x"></i>
                <span class="nav-text">
                        Shop
                    </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="?resource=service&action=manage">
                <i class="fa fa-bookmark fa-2x"></i>
                <span class="nav-text">
                        Service
                    </span>
            </a>
        </li>
    </ul>
    <?php


    ?>
    <ul class="logout">
        <li>
            <a href="?resource=home&action=view&status=logout">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                        Logout
                    </span>
            </a>
        </li>
    </ul>
</nav>

</div>