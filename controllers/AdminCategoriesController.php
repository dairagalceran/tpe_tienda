<?php

include_once('models/CategoryModel.php');
include_once('models/ProductModel.php');
include_once('views/admin/AdminCategoriesView.php');

class AdminCategoriesController {

    private $categoryModel;
    private $productModel;
    private $view;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->view = new AdminCategoriesView();
    }


    public function handleAction($action, $params){
        $isPost = 'POST' === $_SERVER['REQUEST_METHOD'];
        switch ($action){
            case 'list':
                $this->index();
                break;
            case 'new':
                $this->create($isPost);
                break;
            case 'delete':
                $this->delete($params[0]);
                break;
            case 'show':
                $this->show($params[0]);
                break;
            case 'edit':
                $this->edit($isPost,$params);
                break;
            default:
                $this->view->notFound();
        }
    }


    private function index() {
        $categories = $this->categoryModel->getAll();
        $this->view->showCategories($categories);
    }

    private function create($isPost){
        if($isPost) {
            $categoryName = $_REQUEST['name'];
            $this->categoryModel->insert($categoryName);
            $this->view->redirectToIndex();
        }else{
            $this->view->showForm(null);
        }
    }

    private function edit($isPost,$params){
        if($isPost) {
            $categoryName = $_REQUEST['name'];
            $categoryId= $_REQUEST['id'];
            $this->categoryModel->update($categoryId, $categoryName);
            $this->view->redirectToIndex();
        }else{
            $category = $this->categoryModel->getById($params[0]);
            $this->view->showForm($category);
        }

    }

    private function delete($id){
        $this->categoryModel->delete($id);
        $this->view->redirectToIndex();
    }

    private function show($id){
        $category = $this->categoryModel->getById($id);
        $products = $this->productModel->getByCategory($id);
        $this->view->showCategory($category,$products);
    }

}