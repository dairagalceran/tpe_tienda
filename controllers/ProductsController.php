<?php

include_once('models/productsModel.php');
include_once('views/productsView.php');

class ProductsController {

    private $productModel;
    private $view;

    public function __construct() {
        $this->productModel = new ProductsModel();
        $this->view = new ProductsView();
    }

    public function showProducts() {
        $products = $this->productModel->getAllProducts();
        $this->view->showProducts($products);
    }
    
    
    public function showProduct($id) {
        $product = $this->productModel->getProduct($id);
        $this->view->showProduct($product);
    }

   
}