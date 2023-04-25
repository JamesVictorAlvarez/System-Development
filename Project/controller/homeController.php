<?php

namespace controller;

require(dirname(__DIR__)."/model/home.php");


class HomeController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "home".$action;

                $viewClass = "\\view\\"."home".$action;

                if(class_exists($viewClass)){

                }
            }
        }
    }

}

?>