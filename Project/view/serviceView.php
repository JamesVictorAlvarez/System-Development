<title> Service Page</title>
<h2> Service Page</h2>
<head> 
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

<body> 
<nav>
        <ul>
            <li><a href="?resource=home&action=view">Home</a></li>
            <li><a href="?resource=product&action=view">Shop</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">Location</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>
    <br>
    </br>
    <br> </br>
</body>

<?php
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
        $html .= '<td><a href="?resource=service&action=edit&row=' . $e['ID'] . '"> Edit</a></td>';
        $html .= '<td><a href="?resource=service&action=remove&row=' . $e['ID'] . '"> Remove</a></td>';
        
        $html .= '</tr>';
    }
    $html .= "</table>";
    

    echo $html;

    

?>
<button onclick="location.href='?resource=service&action=add'">Add</button>

