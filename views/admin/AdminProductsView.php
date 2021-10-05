<?php

include_once('libs/smarty-master/libs/Smarty.class.php');

class AdminProductsView {

    private $smarty;
    private $sessionUser;

    function __construct($sessionUser){
        $this->smarty = new Smarty();
        $this->sessionUser = $sessionUser;
    }
    
    function showProducts($products){
        $this->smarty->assign('title','Tu tienda de moda online');
        $this->smarty->assign('products', $products);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/products/list.tpl');
    }

    function showProduct($product){
        $this->smarty->assign('title','Hecho para ti');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('home', BASE_URL);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/products/detail.tpl');
    }

    function showForm($product, $categories){
        $this->smarty->assign('product',$product);
        $this->smarty->assign('categories',$categories);
        $this->smarty->assign('sizes',['XS','S','M','L','XL','XXL']);

        $this->smarty->assign('sessionUser', $this->sessionUser);
        $this->smarty->display('../templates/admin/products/edit.tpl');

    }

    function redirectToIndex(){
        header("Location: " . BASE_URL.'admin/'.ROUTE_PRODUCTS);
    }

    function notFound(){
        http_response_code(404);
        echo '404 - Página no encontrada';
        die();
    }
}