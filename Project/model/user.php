<?php
namespace model;
use PDO;

require_once(dirname(__DIR__).'/core/dbConnectionManager.php');
require_once(dirname(__DIR__).'/core/AuthenticationManager.php');

class User
{

    private $id;
    private $username;
    private $password;

    private $dbConnection;
    private $authManager;

    function __construct()
    {

        $conManager = new \database\DBConnectionManager();

        $this->dbConnection = $conManager->getConnection();

        $this->authManager = new \database\AuthenticationManager($this);
    }

    function create()
    {
        $query = "INSERT INTO user (username, password) VALUES(:username, :password)";

        $statement = $this->dbConnection->prepare($query);

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        return $statement->execute(['username' => $this->username, 'password' => $hashedPassword]);

    }

    function login(){

        $verified = false;

        $dbPassword = $this->getPasswordByUsername();

        if(password_verify($this->password, $dbPassword)){

            $verified = true;

        }

        return $verified;

    }

    function logout(){

        $this->authManager->logout();

    }

    function getPasswordByUsername(){

        $query = "SELECT password FROM user WHERE username = :username";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['username'=> $this->username]);

        return $statement->fetchColumn(0);

    }

    function getUserByUsername($username){

        $query = "SELECT * FROM user WHERE username = :username";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['username'=> $username]);

        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function setUsername($username){

        $this->username = $username;

    }

    public function getUsername(){

        return $this->username;

    }

    public function getPassword(){

        return $this->password;

    }

    public function setPassword($password){

        $this->password = $password;

    }

    public function getAuthManager(){

        return $this->authManager;

    }

    public function getFromId(int $id)
    {
        $query = "select * from user where id = :id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }

    public function getId() {
        return $this->id;
    }
}