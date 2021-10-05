<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class UsersView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    
    function showLogin(){
        $this->smarty->display('../templates/users/login.tpl');
    }

    function showRegister(){
        $this->smarty->display('../templates/users/register.tpl');
    }

    function redirectToIndex(){
        header("Location: " . BASE_URL.ROUTE_PRODUCTS);
    }

    function notFound(){
        http_response_code(404);
        echo '404 - Página no encontrada';
        die();
    }
}