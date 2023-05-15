<?php

namespace model;
use PDO;

require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Reservation
{

    private $id;
    private $user_id;
    private $request_id;
    private $first_name;
    private $last_name;
    private $date;
    private $time;

    
    private $dbConnection;

    function __construct() {
        $conManager = new \Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function create()
    {
        $query = "INSERT INTO reservation (request_id, first_name, last_name, date, time) VALUES(:request_id, :first_name, :last_name, :date, :time)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute(['request_id' => $this->request_id, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'date' => $this->date, 'time' => $this->time]);
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

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    function getAll(){
        $query = "select * from reservation";

        $statement = $this->dbConnection->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    function getRow($count){
        $query = "select * from reservation where id=:id";

        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue("id", $count, PDO::PARAM_INT);
        $statement->execute();

        return $result = $statement->fetchAll();
    }

    function updateRow($id, $request_id, $first_name, $last_name, $date, $time)
    {
        $query = "UPDATE reservation SET request_id=:request_id, first_name=:first_name, last_name=:last_name, date=:date, time=:time WHERE ID=:id";

        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":request_id", $request_id);
        $statement->bindValue(":first_name", $first_name);
        $statement->bindValue(":last_name", $last_name);
        $statement->bindValue(":date", $date);
        $statement->bindValue(":time", $time);

        $statement->execute();
    }


    public function addRow($request_id, $first_name, $last_name, $date, $time) {
        $query = "INSERT INTO service (request_id, first_name, last_name, date, time) VALUES (:request_id, :first_name, :last_name, :date, :time)";

        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(":request_id", $request_id);
        $statement->bindValue(":first_name", $first_name);
        $statement->bindValue(":last_name", $last_name);
        $statement->bindValue(":date", $date);
        $statement->bindValue(":time", $time);

        $statement->execute();

        header("Location: http://localhost/System-Development/Project/index.php?resource=reservation&action=manage");
        exit;
    }


    public function removeRow($id) {
        $query = "DELETE FROM reservation WHERE ID=:id";

        $statement = $this->dbConnection->prepare($query);

        $statement->bindValue(":id", $id, PDO::PARAM_INT);

        $result = $statement->execute();


        header("Location: http://localhost/System-Development/Project/index.php?resource=reservation&action=manage");
        exit;

    }

    public function getRequestedServices($id) {
        $query = "select * from reservation AS res INNER JOIN request r on res.request_id = r.id WHERE r.service_id = :service_id";

        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(":service_id", $id);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    public function removeReservationsWithService($id)
    {
        $query = "delete * from reservation AS res INNER JOIN request r on res.request_id = r.id WHERE r.service_id = :service_id";

        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(":service_id", $id);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

}

