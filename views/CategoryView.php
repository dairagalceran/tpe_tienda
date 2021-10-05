<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class CategoryView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategories($classes){

        $this->smarty->assign('titulo','Categorias');
        $this->smarty->assign('categorias', $classes);

        $this->smarty->display('../templates/categoryForm.tpl');
        
    }
    function showItemsCategory($products){
        $this->smarty->assign('tituloProducts','Elegido para');
        $this->smarty->assign('products', $products);
        
        $this->smarty->display('../templates/productsList.tpl');
    }
}