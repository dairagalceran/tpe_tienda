<?php

include_once('models/UserModel.php');
include_once('views/admin/AdminUsersView.php');

class AdminUsersController {

    private $userModel;
    private $view;
    private $sessionUtils;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->sessionUtils = new SessionUtils();
        $this->view = new AdminUsersView($this->sessionUtils->getCurrentUser());
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
        $this->view->showAll($this->userModel->getAll());
    }

    private function create($isPost){
        if($isPost) {
            $name = $_REQUEST['name'];
            $password = $_REQUEST['password'];
            $this->userModel->insert($name, $password);
            $this->view->redirectToIndex();
        }else{
            $this->view->showForm(null);
        }
    }

    private function edit($isPost,$params){
        if($isPost) {
            $name = $_REQUEST['name'];
            $password = $_REQUEST['password'];
            $isAdmin = $_REQUEST['is_admin'];
            $id= $_REQUEST['id'];
            $this->userModel->update($id, $name,md5($password), $isAdmin ? 1 : 0);
            $this->view->redirectToIndex();
        }else{
            $category = $this->userModel->getById($params[0]);
            $this->view->showForm($category);
        }

    }

    private function delete($id){
        $this->userModel->delete($id);
        $this->view->redirectToIndex();
    }

    private function show($id){
        $user = $this->userModel->getById($id);
        $this->view->showDetail($user);
    }

}