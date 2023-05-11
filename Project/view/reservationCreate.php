<?php

namespace view;

use Service;

require_once(dirname(__DIR__) . "/model/service.php");


if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    echo $date;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <title>Assignment 1</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Quicksand";
        }

        body {
            min-width: 50vh;
            background: #161718;
        }

        html,
        body {
            height: 100%;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1b1b1f;
            border-radius: 10px;
            color: #fff;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            margin-bottom: 20px;
            box-sizing: border-box;
            background-color: #fff;
        }

        input[type="submit"] {
            background-color: #121113;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.5s;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
        }

        input[type="submit"]:hover {
            background-color: #1E2221;
            transform: translateY(-10px);
            box-shadow: inset -1px -1px 2px rgba(0, 0, 0, 0.2), 2px 24px 10px rgba(0, 0, 0, 0.1);
        }

        .directory {
            display: flex;
            justify-content: center;
        }

        .directory button {
            background-color: #9DA9BE;
            color: black;
            border: none;
            padding: 10px 20px;
            margin: 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.5s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .directory button:hover {
            background-color: #A0B9C6;
            transform: translateY(-4px);
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <input type="date" name="date">
        <input type="time" name="time" step="600" min="10:00" max="19:00">
        <br />
        <?php
        $service = new Service();
        foreach ($service->getAll() as $s) {
            echo "<input type=\"checkbox\" name=\"services[]\" value={$s['ID']}>{$s['service_name']}";
            echo "<br/>";
        }
        ?>
        <br />
        <input type="submit" name="submit" value="Reserve Appointment">

        <nav class="main-menu">
            <ul>
                <li>
                    <a href="?resource=reservation&action=create">
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
    </form>
</body>

</html>