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
use model\Service;

    $service = new Service();
    $row = $service->getRow($_GET['row']);

    foreach ($row as $e) {
        $service_name = $e['service_name'];
    }

    $html = '<form method="post" enctype="multipart/form-data">';

    $html .= '<h2>UPDATE</h2>
        <input type="hidden" name="resource" value="service">
        <input type="hidden" name="action" value="manage">

        <label for="name">Service Name:</label>
        <input type="text" name="service_name" value= "' . $service_name . '" required>

        <label for="image">Change Image:</label>
        <input type="file" name="image">

        <input type="hidden" name="count" value=' . $_GET['row'] . ' required>

        <input type="hidden" name="row" value=' . $_GET['row'] . '>
        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Cancel" onclick="location.href=\'service/manage\'; return false;">';

    $html .= '</form>';

    echo $html;

    if(isset($_POST['submit'])) {
        $newImageName = null;

        if($_FILES['image']['error'] === 4) {
            // Image file was not uploaded
        } else {
            // Image file was uploaded
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)) {
                // Invalid image extension
            } else if($imageSize > 1000000) {
                // Image size is too large
            } else {
                // Valid image file was uploaded
                $newImageName = uniqid() . '.' . $imageExtension;
                move_uploaded_file($tmpName, './img/serviceImages/' . $newImageName);
            }
        }

        $service->updateRow($_POST['service_name'],$_GET['row'], $newImageName);

        header("Location: service/manage");
        exit;
    }
?>



</html>