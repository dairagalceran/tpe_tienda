<?php

include_once('models/adminModel.php');
include_once('views/adminView.php');

class AdminController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }  


    public function completeFormsAdmin() {
        $products = $this->model->getAllProducts();
        $classes = $this->model->getAllClasses();
        $this->view->showClassesProducts($classes, $products);
    }
    
    function upsertProduct($product){
        $id= $_REQUEST['id_producto'];
        if($id){
            $this->editProduct($id);
        }else{
            $this->insertProduct($product);
        }
    }
    function editProduct($id){
        //armar
    }

    // NO FUNCIONA //
    function insertProduct($product){
        var_dump('dentro de inserr oductos  '.$product);
        $product= $_REQUEST['nombre_producto'];
        $talle = $_REQUEST['talle'];
        $precio = $_REQUEST['precio'];
        $categoria = $_REQUEST['id_categoria'];

        $this->model->insertProduct($product, $talle, $precio, $categoria);
        header("Location: " . BASE_URL."admin"); 
    }

    function deleteProduct($id){
        $this->model->deleteProduct($id);
        header("Location: " . BASE_URL ."admin");

    }
    // INCOMPLETA
    function registerUser(){
        $this->view->showRegisterForm();
    }    
        
    function showClassEditForm($id){
        $category = $this->model->findClassById($id);
        $this->view->completeEditForm($category);
    }

    function upsertclass($class){
        $id= $_REQUEST['id_categoria'];
        if($id){
            $this->editClass($id);
        }else{
            $this->createClass($class);
        }
    }

    private function createClass($class){
        $class = $_REQUEST['categoria'];
        if(!empty($class)){
            $this->model->insertClass($class);
            header("Location: " . BASE_URL."admin"); 
        }else {
            $this->view->showError("Faltan datos obligatorios"); //no funciona VERRRRRR
        }   
    }
    
    private function editClass($id){
        $categoria = $_REQUEST['categoria'];
        $this->model->updateClass($id, $categoria);
        header("Location: " . BASE_URL ."admin");
    }

    function deleteClass($id){
        $this->model->deleteClass($id);
        header("Location: " . BASE_URL ."admin");
    }
    
  
}

