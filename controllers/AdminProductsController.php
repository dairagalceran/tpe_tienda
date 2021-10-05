<?php

include_once('models/ProductModel.php');
include_once('models/CategoryModel.php');
include_once('views/admin/AdminProductsView.php');

class AdminProductsController {

    private $productModel;
    private $categoryModel;
    private $view;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->view = new AdminProductsView();
    }


    public function handleAction($action, $params){
        $isPost = 'POST' === $_SERVER['REQUEST_METHOD'];
        switch ($action){
            case 'list':
                $this->index();
                break;
            case 'show':
                $this->show($params[0]);
                break;
            case 'new':
                $this->create($isPost);
                break;
            case 'delete':
                $this->delete($params[0]);
                break;
            case 'edit':
                $this->edit($isPost,$params);
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

    private function create($isPost){
        if($isPost) {
            $productName = $_REQUEST['name'];
            $productPrice = $_REQUEST['price'];
            $productSize = $_REQUEST['size'];
            $productCategoryId = $_REQUEST['category_id'];
            $this->productModel->insert([$productName,$productPrice, $productSize, $productCategoryId]);
            $this->view->redirectToIndex();
        }else{
            $categories = $this->categoryModel->getAll();
            $this->view->showForm(null, $categories);
        }
    }

    private function edit($isPost,$params){
        if($isPost) {
            $productId= $_REQUEST['id'];
            $productName = $_REQUEST['name'];
            $productPrice = $_REQUEST['price'];
            $productSize = $_REQUEST['size'];
            $productCategoryId = $_REQUEST['category_id'];

            $this->productModel->update($productId , [$productName,$productPrice, $productSize, $productCategoryId]);
            $this->view->redirectToIndex();
        }else{
            $product = $this->productModel->getById($params[0]);
            $categories = $this->categoryModel->getAll();
            $this->view->showForm($product, $categories);
        }

    }
}