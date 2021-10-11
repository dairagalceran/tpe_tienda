
<?php

include_once('models/loginModel.php');
include_once('views/loginView.php');
include_once('helpers/loginHelper.php');

class LoginController
{
    private $model;
    private $view;
    private $loginHelper;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->loginHelper = new LoginHelper();
    }

    public function showLogin()
    {
        $this->view->showFormLogin();
    }

    public function login()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            $user = $this->model->getUser($userEmail);

            if ($user && password_verify($userPassword, ($user->password))) {
                $this->loginHelper->login($user);
                header("Location: " . BASE_URL . "/admin");
            } else {
                $this->view->showFormLogin('Usuario o contraseña inválida');
            }
        }
    }


    function registerForm()
    {
        $this->view->showRegisterForm();
    }

    function registerUser()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->register($email, $userPassword);
            $this->showLogin();
        }else{
            $this->view->showRegisterForm('Datos inválidos');
        }  
    }


    public function logout()
    {
        $this->loginHelper->logout();
    }
}
