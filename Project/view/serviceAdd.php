<title> Add Service </title>

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
            position: relative;
            top: 65px;
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

if (isset($_POST['submit'])) {
    $service = new Service();
    $imageName = '';

    if($_FILES['image']['error'] === 4) {
        echo "<script> alert('Image does not exist'); </script>";
    } else {
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid image extension'); </script>";
        } else if($imageSize > 1000000) {
            echo "<script> alert('Image size is too large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, './img/serviceImages/' . $newImageName);
            $imageName = $newImageName;
        }
    }

    try {
        $service->addRow($_POST['service_name'], $_POST['count'], $imageName);
    } catch (Exception $e) {
        echo "<script> alert('" . $e->getMessage() . "'); </script>";
    }

    // Redirect back to the service page after adding the new service
    header('Location: manage');
    exit;
}
?>

<form method="POST" enctype="multipart/form-data">
    <label>Service Name: </label>
    <input type="text" name="service_name" required><br><br>
    <label>ID: </label>
    <input type="number" name="count" required><br><br>
    <label>Upload Image:</label>
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br><br>
    <input type="submit" name="submit" value="Add Service">
    <input type="submit" value="Cancel" onclick="location.href='service/manage'">
</form>
