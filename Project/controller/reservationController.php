<?php

namespace controller;

use model\Request;
use model\Reservation;
use model\User;

require(dirname(__DIR__) . "/model/reservation.php");


class ReservationController
{

    private $reservation;
    private $user;

    function __construct()
    {
        $this->user = new User();

        if(isset($_COOKIE)){
            if(isset($_COOKIE['user'])){

                $username = $_COOKIE['user'];

                $this->user = $this->user->getUserByUsername($username)[0];

            }
        }

        $authManager = $this->user->getAuthManager();

        var_dump($authManager->isLoggedIn());

        if (isset($_GET)) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                $viewFile = "reservation" . $action;

                $viewClass = "\\view\\" . "reservation" . $action;

                $this->reservation = new Reservation();
                if ($authManager->isLoggedIn()) {
                    if (isset($_POST)) {
                        if ($action == 'create') {
                            if (isset($_POST['submit'])) {
                                if (isset($_POST['services'])) {
                                    foreach($_POST['services'] as $s) {
                                        $request = new Request();
                                        $request->setProductId($s);
                                        $request->create();
                                    }
                                }
                                var_dump($_POST);
                            }

                            if (class_exists($viewClass)) {

                            }
                        }
                    }
                }
            }

        }
    }
}
?>