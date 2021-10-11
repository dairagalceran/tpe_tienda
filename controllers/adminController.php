<?php

include_once('models/adminModel.php');
include_once('views/adminView.php');
include_once('helpers/loginHelper.php');

class AdminController {

    private $model;
    private $view;
    private $loginHelper;

    public function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
        $this->loginHelper = new LoginHelper();
    }  

    
    public function completeFormAdmin() {
        $products = $this->model->getAllProducts();
        $categories = $this->model->getAllCategories();
        $this->view->showCategoriesProducts($categories, $products);
    }

    function showProductsEditForm($id){
        $product = $this->model->findProductById($id);
        $categories = $this->model->getAllCategories();
        $this->view->completeEditProductForm($product , $categories);
    }
    
    function upsertProduct($product){
        $id= $_REQUEST['id'];
        if($id){
            $this->editProduct($id);
        }else{
            $this->insertProduct($product);
        }
    }
    function editProduct($id){
            $this->loginHelper->checkLoggedIn();
            $productId= $_REQUEST['id'];
            $productName = $_REQUEST['name'];
            $productPrice = $_REQUEST['price'];
            $productSize = $_REQUEST['size'];
            $category_id = $_REQUEST['category_id'];
            
            $this->model->updateProduct($productId , $productName,$productPrice, $productSize, $category_id);
            header("Location: " . BASE_URL."/admin");
    }

    
    function insertProduct($product){
        $this->loginHelper->checkLoggedIn();
        $productName= $_REQUEST['name'];
        $productSize = $_REQUEST['size'];
        $productPrice = $_REQUEST['price'];
        $category_id = $_REQUEST['category_id'];

        $this->model->insertProduct($productName, $productSize, floatval($productPrice), $category_id);
        header("Location: " . BASE_URL."/admin"); 
    }

    function deleteProduct($id){
        $this->loginHelper->checkLoggedIn();
        $this->model->deleteProduct($id);
        header("Location: " . BASE_URL ."/admin");

    }

 
   
    function upsertCategories($category){
        $id= $_REQUEST['id'];
        if($id){
            $this->editCategory($id);
        }else{
            $this->createCategory($category);
        }
    }

    function createCategory($category){
        $this->loginHelper->checkLoggedIn();
        $category = $_REQUEST['name'];
        if(!empty($category)){
            $this->model->insertCategory($category);
            header("Location: " . BASE_URL."/admin"); 
        }else {
            $this->view->showError("Faltan datos obligatorios"); //no funciona VERRRRRR
        }   
    }
    
     function editCategory($id){
        $this->loginHelper->checkLoggedIn();
        $categoryName = $_REQUEST['name'];
        $this->model->updateCategory($id, $categoryName);
        header("Location: " . BASE_URL ."/admin");
    }

    function showCategoriesEditForm($id){
        $category = $this->model->findCategoryById($id);
        $this->view->completeEditForm($category);
    }

    function deleteCategory($id){
        $this->loginHelper->checkLoggedIn();
        $this->model->deleteCategory($id);
        header("Location: " . BASE_URL ."/admin");
    }
    
}

