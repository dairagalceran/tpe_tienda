<?php

include_once('models/CategoryModel.php');
include_once('models/ProductModel.php');
include_once('views/CategoriesView.php');

class CategoriesController {

    private $categoryModel;
    private $productModel;
    private $view;
    private $sessionUtils;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->sessionUtils = new SessionUtils();
        $this->view = new CategoriesView($this->sessionUtils->getCurrentUser());
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
        $categories = $this->categoryModel->getAll();
        $this->view->showCategories($categories);
    }

    private function show($id){
        $category = $this->categoryModel->getById($id);
        $products = $this->productModel->getByCategory($id);
        $this->view->showCategory($category,$products);
    }
}