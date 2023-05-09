<?php

namespace controller;

require(dirname(__DIR__)."/model/location.php");


class LocationController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "location".$action;

                $viewClass = "\\view\\"."location".$action;

                if(class_exists($viewClass)){

                }
            }
        }
    }

}

?>