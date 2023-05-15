<title> Service Page</title>

<head>
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
<div style="margin: 0 auto; width: 600;">

<div style="margin: 0 auto; width: 600;">
    <?php
    $service = new Service();

    if (isset($_GET['submit'])) {
        $service->updateRow($_GET["service_name"], $_GET["count"]);
    }

    // Check if search query has been submitted
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $services = $service->search($searchTerm);
    } else {
        $services = $service->getAll();
    }

    // Search form
    $searchForm = '<form method="get" id="search-form" style="text-align:center;">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                    <button type="button" onclick="window.location.href=\'index.php?resource=service&action=manage\'">Cancel</button>
                </form>';

    $html = '';

    // Table header
    $html .= '<table style="border-collapse: collapse; width: 100%;">';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Service Name</th>';
    $html .= '<th>Service Image</th>';
    $html .= '<th>Edit</th>';
    $html .= '<th>Remove</th>';
    $html .= '</tr>';

    foreach ($services as $e) {
        // Table row
        $html .= '<tr style="border: 1px solid black; padding: 10px; margin-bottom: 10px; position: relative;">';
        $html .= '<td>' . $e['ID'] . '</td>';
        $html .= '<td>' . $e['service_name'] . '</td>';
        $html .= '<td><img class="previewImage" src="img/serviceImages/' . $e['service_image'] . '"></td>';
        $html .= '<td><a href="?resource=service&action=edit&row=' . $e['ID'] . '">Edit</a></td>';
        $html .= '<td><a href="?resource=service&action=remove&row=' . $e['ID'] . '">Remove</a></td>';
        $html .= '</tr>';
    }

    // Table footer
    $html .= '</table>';

    // Centered "Add" button
    $html .= '<div style="text-align:center;margin-top:80px;">
                <button onclick="location.href=\'?resource=service&action=add\'">Add</button>
            </div>';

    // Echo search form
    echo $searchForm;

    // Echo services container
    echo '<div id="services-container">' . $html . '</div>';

    // Add jQuery and AJAX script
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script>
                $(document).ready(function() {
                    // Submit search form using AJAX
                    $("#search-form").on("submit", function(e) {
                        e.preventDefault(); // Prevent default form submission

                        // Get search term from input
                        var searchTerm = $("input[name=\'search\']").val();

                        // Send AJAX request to search.php with search term
                        $.ajax({
                            url: "search.php",
                            type: "get",
                            data: {search: searchTerm},
                            success: function(response) {
                                // Update services container with search results
                                $("#services-container").html(response);
                            }
                        });
                    });
                });
            </script>';
    ?>
</div>







<!-- <div class="add_div">
<button onclick="location.href='?resource=service&action=add'">Add</button> -->
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

</div>