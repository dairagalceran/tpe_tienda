<?php
include_once('models/AdminModel.php');
include_once('views/AdminView.php');


class AdminController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    public function showForms(){
        $category = $this->model->getAllCategories();
        $this->view->showCategories($category);
        $products = $this->model->getAllProducts();
        $this->view->showProducts($products);
    }

    public function createEditCategory($class){
        $class = $_REQUEST['categoria'];
        $this->model->insertCategory($class);
        header("Location: " .BASE_URL.'admin'); 
    }
    
    public function deleteCategory($id){
        $this->model->deleteCategory($id);
        header("Location: " .BASE_URL ."admin");
    }
    
    
    
} 