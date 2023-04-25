<html>
<title> Edit Service </title>
<h2> Edit Service </h2>
<?php
    $service = new Service();
    $row = $service->getRow($_GET['row']);

    foreach ($row as $e) {
        $service_name = $e['service_name'];
    }

    $html = '<form method="get">';

    $html .= '<h2>UPDATE</h2>
        <input type="hidden" name="resource" value="service">
        <input type="hidden" name="action" value="view">

        <label for="name">Service Name:</label>
        <input type="text" name="service_name" value= "' . $service_name . '" required>

        <input type="hidden" name="count" value=' . $_GET['row'] . ' required>

        <input type="hidden" name="row" value=' . $_GET['row'] . '>
        <input type="submit" value="Submit" name="submit">';

    $html .= "</form>";
    echo $html;
?>

</html>