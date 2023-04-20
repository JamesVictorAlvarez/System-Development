<?php

require(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Product {

    private $id;
    private $name;
    private $price;
    private $description;
    private $available;

    private $dbConnection;

    function __construct() {
        $conManager = new Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function getAll(){
        $query = "select * from products";

        $statement = $this->dbConnection->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }
}
?>