<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class CategoriesView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategories($categories){
        $this->smarty->assign('title', 'Categorias');
        $this->smarty->assign('i', '1');
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('../templates/categories/categoryForm.tpl');
    
    }

    function showItemsCategory($products, $category){
        $this->smarty->assign('titleItemsCategory',  $category);
        $this->smarty->assign('products', $products);

        $this->smarty->display('../templates/categories/productsByCategory.tpl');
    }
   
}