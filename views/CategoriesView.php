<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class CategoriesView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategories($categories){

        $this->smarty->assign('title','Categorias');
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('../templates/categories/list.tpl');
        
    }

    function showCategory($category, $products){

        $this->smarty->assign('category',$category);
        $this->smarty->assign('products', $products);

        $this->smarty->display('../templates/categories/detail.tpl');

    }

    function redirectToIndex(){
        header("Location: " . BASE_URL.ROUTE_CATEGORIES);
    }

    function notFound(){
        http_response_code(404);
        echo '404 - Página no encontrada';
        die();
    }
}