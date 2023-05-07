<!DOCTYPE html>
<html lang="en">

<head>
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

<body>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="resource" value="product">
        <input type="hidden" name="action" value="manage">

        <label for="name">Name:</label>
        <input type="text" name="name" value= ''>

        <label for="price">Price:</label>
        <input type="text" name="price" value=''>

        <label for="category">Category:</label>
        <input type="text" name="category" value=''>

        <label for="stock">Available:</label>
        <input type="text" name="available" value=''>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=''>

    </br>
    </br>

        <input type="submit" value="Back" name="back">
        <input type="submit" value="Add" name="add">

        <?php
            $product = new product();

            if (isset($_POST['back'])) 
                header("location:?resource=product&action=manage");

            if (isset($_POST['add'])) {
                if($_FILES['image']['error'] === 4) {
                    echo "<script> alert('Image Does Not Exist'); </script>";
                } else {
                    $imageName = $_FILES['image']['name'];
                    $imageSize = $_FILES['image']['size'];
                    $tmpName = $_FILES['image']['tmp_name'];

                    $validImageExtension = ['jpg', 'jpeg', 'png'];
                    $imageExtension = explode('.', $imageName);
                    $imageExtension = strtolower(end($imageExtension));
                    if(!in_array($imageExtension, $validImageExtension)) {
                        header("location:?resource=product&action=manage");
                        echo "<script> alert('Invalid Image Extension'); </script>";
                    } else if($imageSize > 1000000) {
                        echo "<script> alert('Image Size Is Too Large'); </script>";
                        header("location:?resource=product&action=manage");
                    } else {
                        $newImageName = uniqid();
                        $newImageName .= '.' . $imageExtension;

                        move_uploaded_file($tmpName, './img/productImages/' . $newImageName);

                    }
                } 

                $product->addRow($_POST["name"], $_POST["price"], $_POST["category"], $_POST["available"], $newImageName);
                header("location:?resource=product&action=manage");
            } 
            
        ?>
    </form>

</body>

</html>