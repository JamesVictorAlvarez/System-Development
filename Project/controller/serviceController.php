<?php

namespace controller;

require(dirname(__DIR__)."/model/service.php");


class ServiceController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "service".$action;

                $viewClass = "\\view\\"."service".$action;

                if(class_exists($viewClass)){

                }
            }
        }
    }

}

?>