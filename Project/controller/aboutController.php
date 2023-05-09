<?php

namespace controller;

require(dirname(__DIR__)."/model/about.php");


class AboutController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "about".$action;

                $viewClass = "\\view\\"."about".$action;

                if(class_exists($viewClass)){

                }
            }
        }
    }

}

?>