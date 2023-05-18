<?php
namespace model;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");
use database\DBConnectionManager;

class Service {

    private $id;
    private $name;

    private $dbConnection;

    function __construct() {
        $conManager = new DBConnectionManager();
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

    function updateRow($name, $count, $imageName)
{
    $query = "UPDATE service SET service_name=:name, service_image=:image WHERE ID=:count";

    $statement = $this->dbConnection->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":count", $count);
    $statement->bindValue(":image", $imageName);

    $statement->execute();
}


public function addRow($name, $count, $imageName) {
    $checkQuery = "SELECT COUNT(*) FROM service WHERE ID = :count";
    $checkStatement = $this->dbConnection->prepare($checkQuery);
    $checkStatement->bindValue(":count", $count);
    $checkStatement->execute();
    $rowCount = $checkStatement->fetchColumn();

    if ($rowCount > 0) {
        echo "<script> alert('Service with this ID already exists. Please try again.'); window.location.href = '?resource=service&action=add'; </script>";
        exit;
    } else {
        $query = "INSERT INTO service (service_name, ID, service_image) VALUES (:name, :count, :image)";

        $statement = $this->dbConnection->prepare($query);

        $statement->bindValue(":name", $name);
        $statement->bindValue(":count", $count);
        $statement->bindValue(":image", $imageName);

        $statement->execute();

        header("Location: http://localhost/System-Development/Project/index.php?resource=service&action=manage");
        exit;
    }
}


    

    public function removeRow($id) {
        $query = "DELETE FROM service WHERE ID=:id";
        
        $statement = $this->dbConnection->prepare($query);
        
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        
        $result = $statement->execute();
    
       
            header("Location: http://localhost/System-Development/Project/index.php?resource=service&action=manage");
            exit;
        
    }

    public function search($searchTerm) {
        $query = "SELECT * FROM service WHERE service_name LIKE :searchTerm";
    
        $statement = $this->dbConnection->prepare($query);
        $statement->bindValue(":searchTerm", '%' . $searchTerm . '%');
        $statement->execute();
    
        return $statement->fetchAll();
    }
    
    
    

    

    
    
}
?>