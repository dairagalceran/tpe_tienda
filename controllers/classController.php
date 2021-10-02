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

    public function createEditClass($class){
        $class = $_REQUEST['categoria'];
        $this->model->insertClass($class);
        header("Location: " . BASE_URL."/categoria"); 
    }
    
    public function deleteClass($id){
        $this->model->deleteClass($id);
        header("Location: " . BASE_URL ."/categoria");
    }
}