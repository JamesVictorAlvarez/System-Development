<title> Add Service </title>
<h2> Add Service </h2>

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
use model\Service;
$service = new Service();
if (isset($_POST['cancel'])) {
    header('Location: manage');
    exit;
}
?>

<?php
$html = '
<form method="post">
    <label for="first_name">First name:</label>
    <input type="text" id="first_name" name="first_name">
    <label for="last_name">Last name:</label>
    <input type="text" id="last_name" name="last_name">
    <input type="date" id="date" name="date">
    <input type="time" name="time" id="time" step="600" min="10:00" max="19:00">
    <br/>
    <br/>
    <h2>Select your wanted services:</h2>
    <br/>';
foreach ($service->getAll() as $s) {
    $html .= "{$s['service_name']}<input type=\"checkbox\" name=\"services[]\" value={$s['ID']}>";
    $html .= "<br/>";
}
$html .= '<input type="submit" name="submit" value="Add Appointment">';
$html .= '<input type="submit" value="Cancel" name="cancel">';
$html .= '</form></div>';
echo $html;
?>
