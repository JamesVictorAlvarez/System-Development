<html>
<title> Edit Service </title>
<h2> Edit Service </h2>

<head>
    <base href="/system-development/Project/"
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<?php

use model\Reservation;

$reservation = new Reservation();
$row = $reservation->getRow($_GET['row']);

//$service = new Service();
//
//foreach ($row as $e) {
//    $service_name = $e['service_name'];
//}

$first_name = $row[0]['first_name'];
$last_name = $row[0]['last_name'];
$date = $row[0]['date'];
$time = $row[0]['time'];
$request_id = $row[0]['request_id'];

$html = '<form method="post" enctype="multipart/form-data">';
$html .= '<h2>UPDATE</h2>
        <input type="hidden" name="resource" value="service">
        <input type="hidden" name="action" value="manage">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="' . $first_name . '" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value= "' . $last_name . '" required>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="' . $date . '"required>
        <label for="time">Last Name:</label>
        <input type="time" name="time" id="time" value="' . $time .'"step="600" min="10:00" max="19:00" required>
        <br/>
        <br/>
        <input type="hidden" name="request_id" value=' . $request_id . ' required>

        <input type="hidden" name="row" value=' . $_GET['row'] . '>
        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Cancel" onclick="location.href=\'reservation/manage\'">';

$html .= '</form>';

echo $html;

if(isset($_POST['submit'])) {
    $reservation->updateRow($_POST['row'], $_POST['request_id'], $_POST['first_name'], $_POST['last_name'], $_POST['date'], $_POST['time']);

    header("Location: reservation/manage");
    exit;
}
?>



</html>