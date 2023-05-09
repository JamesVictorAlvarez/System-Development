<?php

namespace model;
require(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Reservation
{

    private $id;
    private $user_id;
    private $request_id;

    function __construct() {
        $conManager = new \Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function create()
    {
        $query = "INSERT INTO reservation (user_id, request_id) VALUES(:user_id, :request_id)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute(['user_id' => $this->user_id, 'request_id' => $this->request_id]);
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * @param mixed $request_id
     */
    public function setRequestId($request_id)
    {
        $this->request_id = $request_id;
    }


}

