<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class ProductsView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    
    function showProducts($products){
        $this->smarty->assign('title','Tu tienda de moda online');
        $this->smarty->assign('products', $products);
        
        $this->smarty->display('../templates/products/list.tpl');
    }

    function showProduct($product){
        $this->smarty->assign('title','Hecho para ti');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('home', BASE_URL);

        $this->smarty->display('../templates/products/detail.tpl');
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