<?php

require(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Product {

    private $id;
    private $name;
    private $price;
    private $category;
    private $available;

    private $dbConnection;

    function __construct() {
        $conManager = new Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function getRow($count) {

        $query = "select * from product where id = $count";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getAll() {
        $query = "select * from product";

        $statement = $this->dbConnection->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    function updateRow($name, $price, $available,  $count) {
        $query = "update product set name='$name', price=$price, available=$available where id = $count";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();
    }

    function addRow($name, $price, $available) {
        $query = "insert into product (name, price, available) values ('$name', '$price', '$available')";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();
    }

    function deleteRow($count) {
        $query = "delete from product where id = $count";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();
    }
}
?>