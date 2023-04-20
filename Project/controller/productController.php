<?php

namespace controller;

require(dirname(__DIR__)."/model/product.php");


class ProductController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "product".$action;

                $viewClass = "\\view\\"."product".$action;

                if(class_exists($viewClass)){

                }
            }
        }
    }

}

?>