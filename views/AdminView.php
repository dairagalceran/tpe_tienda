<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class AdminView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategories($categories){

        $this->smarty->assign('titulo','Categorias');
        $this->smarty->assign('categorias', $categories);

        $this->smarty->display('../templates/adminForms.tpl');
        
    }
    function showProducts($products){
        $this->smarty->assign('tituloProducts','Tu tienda de moda online');
        $this->smarty->assign('products', $products);
        
        $this->smarty->display('../templates/adminForms.tpl');
    }
}