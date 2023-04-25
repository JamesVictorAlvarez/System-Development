<?php

namespace controller;

require(dirname(__DIR__)."/model/user.php");

class UserController{

    private $user;

    function __construct(){
        if(isset($_GET)){

            if(isset($_GET['action'])){

                $action = $_GET['action'];

                $viewClass = "\\view\\"."user".$action;

                $this->user = new \model\User();

                if (isset($_POST)) {
                    if ($action == 'create') {
                        if (isset($_POST['username']) && isset($_POST['password']) ) {
                            $this->user->setUsername($_POST['username']);

                            $this->user->setPassword($_POST['password']);
                        }
                    } else if ($action == 'login') {
                        if (isset($_POST['username']) && isset($_POST['password']) ) {
                            $this->user->setUsername($_POST['username']);

                            $this->user = $this->user->getUserByUsername($_POST['username'])[0];

                            $this->user->setPassword($_POST['password']);
                        }
                    }
                    $this->user->$action();
                }

                if(class_exists($viewClass)){
                    $view = new $viewClass($this->user);
                }
            }
        }
    }

}

?>