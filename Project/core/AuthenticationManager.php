<?php
namespace Database;
class AuthenticationManager {
    private $user;

    function __construct($user){

        $this->user = $user;

    }

    function login(){

        session_name("login_session");

        session_start();

        $_SESSION['username'] = $this->user->getUsername();

        setcookie('user', $this->user->getUsername(), time()+3600);

    }

    function isLoggedIn(): bool
    {

        session_name("login_session");

        session_start();

        $isLoggedIn = false;

        if(isset($_SESSION)){
            if(isset($_SESSION['username'])){
                if($_SESSION['username'] == $this->user->getUsername()){
                    $isLoggedIn = true;
                }
            }

        }

        return $isLoggedIn;

    }

    function logout(){

        $_SESSION = array();

        session_destroy ();

        setcookie('user', $this->user->getUsername(), time()-3600);

    }
}