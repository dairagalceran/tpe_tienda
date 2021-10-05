<?php


class SessionUtils
{

    function init(){
        $status = session_status();
        if($status == PHP_SESSION_NONE){
            session_start();
        }
    }

    function getCurrentUser(){
        $this->init();
        return isset($_SESSION['user'])?$_SESSION['user'] : false;
    }

    function onUserLogin($user){
        $this->init();
        $_SESSION['user'] = ['id' => $user->id, 'email' => $user->email, 'is_admin' => $user->is_admin];
    }

    function onUserLogout(){
        $this->init();
        $_SESSION = array();
        session_unset();
        session_destroy();
    }

}