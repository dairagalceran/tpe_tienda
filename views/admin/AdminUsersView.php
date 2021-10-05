<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class AdminUsersView {

    private $smarty;
    private $sessionUser = false;

    function __construct($sessionUser){
        $this->smarty = new Smarty();
        $this->sessionUser = $sessionUser;
    }

    function showAll($users){

        $this->smarty->assign('title','Usuarios');
        $this->smarty->assign('users', $users);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/users/list.tpl');
        
    }

    function showDetail($user){

        $this->smarty->assign('user',$user);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/users/detail.tpl');

    }

    function showForm($user){
        $this->smarty->assign('user',$user);
        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/users/edit.tpl');

    }

    function redirectToIndex(){
        header("Location: " . BASE_URL.'admin/'.ROUTE_USERS);
    }

    function notFound(){
        http_response_code(404);
        echo '404 - Página no encontrada';
        die();
    }
}