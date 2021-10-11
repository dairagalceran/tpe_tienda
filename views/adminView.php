<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class AdminView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategoriesProducts($categories, $products){
        $this->smarty->assign('titulo','Categorias');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('titleAdmin','Productos');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('sizes',['XS','S','M','L','XL','XXL']);
        $this->smarty->display('../templates/admin/admin.tpl');  
    }
    
    function completeEditForm($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('../templates/admin/categories/categoryEditForm.tpl');
    }
   
    function completeEditProductForm($product, $categories){
        $this->smarty->assign('product', $product);
        $this->smarty->assign('categories',$categories);
        $this->smarty->assign('sizes',['XS','S','M','L','XL','XXL']);

        //$this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/products/editProductForm.tpl');
    }

    function showError($msgError) {
        $this->smarty->assign('error', $msgError);
        $this->smarty->display('../templates/admin/admin.tpl');
    }

    function showRegisterForm(){
        $this->smarty->display('../templates/logRegister.tpl');
    }
}