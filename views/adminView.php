<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class AdminView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showClassesProducts($classes, $products){
        $this->smarty->assign('titulo','Categorias');
        $this->smarty->assign('categorias', $classes);
        $this->smarty->assign('tituloAdmin','Productos');
        $this->smarty->assign('productos', $products);
        $this->smarty->display('../templates/admin.tpl');  
    }
    
    function completeEditForm($category){
        $this->smarty->assign('categoria', $category);
        $this->smarty->display('../templates/classForm.tpl');
    }

    function showError($msgError) {
        $this->smarty->assign('error', $msgError);
        $this->smarty->display('../templates/admin.tpl');
    }

    function showRegisterForm(){
        $this->smarty->display('../templates/logRegister.tpl');
    }
}