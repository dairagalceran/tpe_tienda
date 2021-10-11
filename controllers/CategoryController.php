<?php

include_once('models/CategoryModel.php');
include_once('views/CategoryView.php');
include_once('models/productsModel.php');

 class CategoryController {

    private $categoryModel;
    private $productModel;
    private $view;
    

    public function __construct() {
        $this->categoryModel = new CategoriesModel();
        $this->productModel = new ProductsModel();
        $this->view = new CategoriesView();
    }

    function showCategories() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view->showCategories($categories);
    }
    
    function showItemsByCategory($id){
        $category = $this->categoryModel->getById($id);
        $products = $this->productModel->getByCategory($id);
        $this->view->showItemsCategory($products,$category);
    }
   
}

