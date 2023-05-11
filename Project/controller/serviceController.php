<?php

namespace controller;

require(dirname(__DIR__)."/model/service.php");


class ServiceController{

    function __construct(){

        $this->user = new \model\User();

        if(isset($_COOKIE)){
            if(isset($_COOKIE['user'])){

                $username = $_COOKIE['user'];

                $this->user = $this->user->getUserByUsername($username)[0];

            }
        }

        $authManager = $this->user->getAuthManager();




        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "service".$action;

                $viewClass = "\\view\\"."service".$action;

                if ($authManager->isLoggedIn()) {
                    if(class_exists($viewClass)){

                    }
                } else {
                    header('location:?resource=user&action=login');
                }
            }
        }
    }

}

?>