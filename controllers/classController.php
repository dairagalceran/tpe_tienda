<?php

include_once('models/classModel.php');
include_once('views/classView.php');

class ClassController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ClassModel();
        $this->view = new ClassView();
    }

    public function showClasses() {
        $classes = $this->model->getAllClasses();
        
        $this->view->showClasses($classes);
    }

    public function showItemsClass($id){
        $items = $this->model->getAllItemsClass($id);
        $this->view->showItemsClass($items);
    }

    
}