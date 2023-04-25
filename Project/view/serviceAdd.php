<title> Add Service </title>
<h2> Add Service </h2>

<?php
if (isset($_POST['submit'])) {
    $service = new Service();
    $service->addRow($_POST['service_name'], $_POST['count']);

    // Redirect back to the service page after adding the new service
    header('Location: ?resource=service');
    exit;
}
?>

<form method="POST">
    <label>Service Name: </label>
    <input type="text" name="service_name" required><br><br>
    <label>Count: </label>
    <input type="number" name="count" required><br><br>
    <input type="submit" name="submit" value="Add Service">
</form>
