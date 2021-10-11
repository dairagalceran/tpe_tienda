<?php

class LoginHelper {
    
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE) { // si la sesion exite y esta activa
            session_start();
        }
    }

    public function login($user) {
        ;
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        header("Location: " . BASE_URL . "/admin"); 
    }

   /*function getCurrentUser(){
        if (isset($_SESSION['user'])){
           $user= $_SESSION['user'] ;
        }else{
            header("Location: " . BASE_URL ."/login");
        }
          return $user;  
    }*/

    public function checkLoggedIn() { // chequea si esta logueado
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL ."/login");
            die();
        }
    }

    function logout() {
        session_destroy();
        header("Location: " . BASE_URL ."/home");   
    } 
}