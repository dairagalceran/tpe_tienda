<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class AdminCategoriesView {

    private $smarty;
    private $sessionUser;

    function __construct($sessionUser){
        $this->smarty = new Smarty();
        $this->sessionUser = $sessionUser;
    }

    function showCategories($categories){

        $this->smarty->assign('title','Categorias');
        $this->smarty->assign('categories', $categories);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/categories/list.tpl');
        
    }

    function showCategory($category, $products){

        $this->smarty->assign('category',$category);
        $this->smarty->assign('products', $products);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/categories/detail.tpl');

    }

    function showForm($category){
        $this->smarty->assign('category',$category);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/categories/edit.tpl');

    }

    function redirectToIndex(){
        header("Location: " . BASE_URL.'admin/'.ROUTE_CATEGORIES);
    }

    function notFound(){
        http_response_code(404);
        echo '404 - Página no encontrada';
        die();
    }
}