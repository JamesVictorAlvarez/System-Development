<?php

require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Service {

    private $id;
    private $name;

    private $dbConnection;

    function __construct() {
        $conManager = new Database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
    }

    function getAll(){
        $query = "select * from service";

        $statement = $this->dbConnection->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    function getRow($count){
        $query = "select * from service where ID = $count";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $result = $statement->fetchAll();
    }

    function updateRow($name, $count)
    {
        $query = "update service set service_name='$name' where ID = $count";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();
    }

    public function addRow($name, $count) {
        $query = "INSERT INTO service (service_name, ID) VALUES (:name, :count)";
    
        $statement = $this->dbConnection->prepare($query);
    
        $statement->bindValue(":name", $name);
        $statement->bindValue(":count", $count);
    
        $statement->execute();

        header("Location: http://localhost/System-Development/Project/index.php?resource=service&action=manage");
        exit;
    }

    public function removeRow($id) {
        $query = "DELETE FROM service WHERE ID=:id";
        
        $statement = $this->dbConnection->prepare($query);
        
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        
        $result = $statement->execute();
    
       
            header("Location: http://localhost/System-Development/Project/index.php?resource=service&action=manage");
            exit;
        
    }
    

    
    
}
?>