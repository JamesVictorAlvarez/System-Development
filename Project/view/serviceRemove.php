<?php

$rowNumber = $_GET['row'];

if (isset($_POST['submit'])) {
    $service = new Service();
    $service->removeRow($_POST['id']);

    // Redirect back to the service page after removing the service
    header('Location: ?resource=service');
    exit;
}
?>
<form method="POST">
    <label>ID: </label>
    <input type="number" name="id" required value="<?php echo $rowNumber; ?>"><br><br>
    <input type="submit" name="submit" value="Remove Service">
</form>


