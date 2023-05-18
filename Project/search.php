<?php
require_once(dirname(__DIR__) . "/Project/model/Service.php");
use model\Service;
$service = new Service();

// Make sure the search term was submitted via GET
if(isset($_GET['search'])) {
    // Retrieve the search term from the GET request
    $searchTerm = $_GET['search'];

    // Execute the search query using the $service object
    $services = $service->search($searchTerm);

    // Build the HTML output for the search results
    $html = '<table>';
    $html .= '<tr><th>ID</th><th>Service Name</th><th>Image</th><th>Edit</th><th>Remove</th></tr>';
    foreach ($services as $e) {
        $html .= '<tr>';
        $html .= '<td>' . $e['ID'] . '</td>';
        $html .= '<td>' . $e['service_name'] . '</td>';
        $html .= '<td><img class="previewImage" src="img/serviceImages/' . $e['service_image'] . '"></td>';
        $html .= '<td><a href="?resource=service&action=edit&row=' . $e['ID'] . '">Edit</a></td>';
        $html .= '<td><a href="?resource=service&action=remove&row=' . $e['ID'] . '">Remove</a></td>';
        $html .= '</tr>';
    }
    $html .= '</table>';

    // Return the HTML output to the AJAX request
    echo $html;
}
