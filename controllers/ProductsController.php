<?php

include_once('models/ProductModel.php');
include_once('views/ProductsView.php');

class ProductsController {

    private $productModel;
    private $view;
    private $sessionUtils;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->sessionUtils = new SessionUtils();
        $this->view = new ProductsView($this->sessionUtils->getCurrentUser());
    }


    public function handleAction($action, $params){
        switch ($action){
            case 'list':
                $this->index();
                break;
            case 'show':
                if (count($params)>0){
                    $this->show($params[0]);
                }else{
                    $this->view->notFound();
                }
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