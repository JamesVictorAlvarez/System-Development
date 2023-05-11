<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="style/productDesign.css">
    <link rel="stylesheet" href="style/sidebar.css">
</head>

<body>
    <?php

    $product = new product();

    $products = $product->getAll();

    //Creating the table
    $html = '<table id="productsTable">';
    $html .= "<thead><th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Image</th>
                <th></th>
                </thead>";

    $counter = 0;
    foreach ($products as $e) {
        $counter = $e['id'];
        $html .= "<tr>
                    <td>" . $e['id'] . "</td>
                    <td>" . $e['name'] . "</td>
                    <td>" . $e['price'] . "</td>
                    <td>" . $e['category'] . "</td>
                    <td>" . $e['available'] . "</td>
                    <td><img class = 'previewImage' src='img/productImages/" . $e['image'] . "'></td>
                    <td>
                        <form method='post' action='?resource=product&action=edit'>
                            <input type='hidden' name = 'row' value =$counter>
                            <input type='submit' value ='Edit'>
                        </form>
                        <form method='post'>
                            <input type='hidden' name = 'row' value =$counter>
                            <input type='submit' value ='Delete' name='delete'>
                        </form>
                    </td>
                    </tr>";
    }
    $html .= "</table>";
    $html .= "<div style='display: flex; justify-content: center; padding: 20px;'>
        <form method='post'>
            <input type='hidden' name = 'row' value =$counter>
            <input type='submit' value ='Add' name='add' class='addButton'>
        </form></div>";
    // if (isset($_POST['add'])) 
    //     header("location:?resource=product&action=add");    
    if (isset($_POST['delete'])) {
        $product->deleteRow($_POST["row"]);
        header("location:?resource=product&action=manage");
    }
    if (isset($_POST['add']))
        header("location:?resource=product&action=add");
    echo $html;

    ?>

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
        <?php
            

        ?>
        <ul class="logout">
            <li>
                <a href="?resource=home&action=view">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>


</body>

</html>