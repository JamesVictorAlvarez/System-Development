<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="style/productDesign.css">
</head>

<body>
    <?php

    $product = new product();

    //Update the database
    if (isset($_POST['edit']))
        $product->updateRow($_POST["name"], $_POST["price"], $_POST["available"], $_POST["count"]);

    if (isset($_POST['add']))
        $product->addRow($_POST["name"], $_POST["price"], $_POST["available"]);

    $products = $product->getAll();

    //Creating the table
    $html = '<table id="productsTable">';
    $html .= "<thead><th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th></th>
                </thead>";

    $counter = 0;
    foreach ($products as $e) {
        $counter = $e['id'];
        $html .= "<tr>
                    <td>" . $e['id'] . "</td>
                    <td>" . $e['name'] . "</td>
                    <td>" . $e['price'] . "</td>
                    <td>" . $e['available'] . "</td>
                    <td>
                        <form method='post' action='?resource=product&action=edit'>
                            <input type='hidden' name = 'resource' value ='product'>
                            <input type='hidden' name = 'action' value ='edit'>
                            <input type='hidden' name = 'row' value =$counter>
                            <input type='submit' value ='Edit'>
                        </form>
                    </td>
                    </tr>";
    }
    $html .= "</table>";
    $html .= "<div style='display: flex; justify-content: center; padding: 20px;'><form method='get'>
            <input type='hidden' name = 'resource' value ='product'>
            <input type='hidden' name = 'action' value ='add'>
            <input type='hidden' name = 'row' value =$counter>
            <input type='submit' value ='Add'>
        </form></div>";
    echo $html;
    ?>

    
</body>

</html>