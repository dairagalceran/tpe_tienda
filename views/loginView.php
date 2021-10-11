<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class LoginView {
    private $smarty; 

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showRegisterForm($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/users/logRegister.tpl');
    }
    
    function showFormLogin($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/users/formLogin.tpl');
    }

}