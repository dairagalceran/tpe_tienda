<?php

include_once('models/productsModel.php');
include_once('views/productsView.php');

class ProductsController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductsModel();
        $this->view = new ProductsView();
    }

    public function showProducts() {
        $products = $this->model->getAllProducts();
        $this->view->showProducts($products);
    }
    
    public function showProduct($id) {
        $product = $this->model->getProduct($id);
        $this->view->showProduct($product);
    }
    
}