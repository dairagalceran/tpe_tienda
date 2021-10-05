<?php

include_once('models/ProductModel.php');
include_once('views/ProductsView.php');

class ProductsController {

    private $productModel;
    private $view;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->view = new ProductsView();
    }


    public function handleAction($action, $params){
        switch ($action){
            case 'list':
                $this->index();
                break;
            case 'show':
                $this->show($params[0]);
                break;
            default:
                $this->view->notFound();
        }
    }

    private function index() {
        $products = $this->productModel->getAll();
        $this->view->showProducts($products);
    }
    
    private function show($id) {
        $product = $this->productModel->getById($id);
        $this->view->showProduct($product);
    }
    
}