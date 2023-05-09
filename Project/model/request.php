<?php

namespace model;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Request
{

    private $id;
    private $service_id;

    private $dbConnection;

    function __construct() {
        $conManager = new \Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function create()
    {
        $query = "INSERT INTO request (service_id) VALUES(:service_id)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute(['service_id' => $this->product_id]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return \PDO
     */
    public function getDbConnection(): \PDO
    {
        return $this->dbConnection;
    }



}