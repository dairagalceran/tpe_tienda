<?php

include_once('models/CategoryModel.php');
include_once('views/CategoryView.php');

class CategoryController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategories() {
        $category = $this->model->getAllCategories();
        $this->view->showCategories($category);
    }

    public function showItemsCategory($id){
        $product = $this->model->getItemsCategory($id);
        $this->view->showItemsCategory($product);
    }
    
}