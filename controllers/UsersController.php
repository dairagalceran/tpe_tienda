<?php

include_once('models/UserModel.php');
include_once('views/UsersView.php');
include_once('utils/SessionUtils.php');

class UsersController {

    private $userModel;
    private $view;
    private $sessionUtils;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->sessionUtils = new SessionUtils();
        $this->view = new UsersView();
    }

    public function handleAction($action, $params){
        $isPost = 'POST' === $_SERVER['REQUEST_METHOD'];
        switch ($action) {
            case 'login':
                $this->login($isPost);
                break;
            case 'logout':
                $this->logout();
                break;
            case 'register':
                $this->register($isPost);
                break;
            default:
                $this->view->notFound();
        }
    }

    private function login($isPost) {
        if($isPost) {
            $email = $_REQUEST['email'];
            $user = $this->userModel->getByEmail($email);
            if($user){
                $password = md5($_REQUEST['password']);
                if($user->password === $password){
                    $this->sessionUtils->onUserLogin($user);
                   $this->view->redirectToIndex();
                }else{
                    $this->view->showLogin();
                }
            }else{
                $this->view->showLogin();
            }
        }else{
            $this->view->showLogin();
        }
    }

    private function logout(){
        $this->sessionUtils->onUserLogout();
        $this->view->showLogin();
    }

    private function register($isPost) {
        if($isPost) {
            $email = $_REQUEST['email'];
            $user = $this->userModel->getByEmail($email);
            if($user) {
                //error
                $this->view->showRegister();
            }else {
                $password = md5($_REQUEST['password']);
                $userId = $this->userModel->insert($email, $password);
                $user = $this->userModel->getById($userId);
                $this->sessionUtils->onUserLogin($user);
                $this->view->redirectToIndex();
            }
        }else{
            $this->view->showRegister();
        }
    }


}