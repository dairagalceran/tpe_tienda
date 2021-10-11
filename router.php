<?php


require_once('controllers/CategoryController.php');
require_once('controllers/ProductsController.php');
require_once('controllers/adminController.php');
require_once('controllers/loginController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));


if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'home';
}
$params = explode('/', $action);

$controllerCategory = new CategoryController();
$controllerProducts = new ProductsController();
$controllerAdmin = new AdminController();

switch ($params[0]) {
    case 'home':
        $controllerProducts->showProducts();
        break; 
    case 'admin':
        $controllerAdmin->completeFormAdmin();
        break;
    case 'login':
        $loginController = new LoginController();
        $loginController->showLogin();
        break;
    case 'verify': 
        $loginController = new LoginController();
        $loginController->login();
        break;
    case 'logout': 
        $loginController = new LoginController();
        $loginController->logout();
        break;
    case 'registerForm': 
        $loginController = new LoginController();
        $loginController->registerForm();
        break;
    case 'register': 
        $loginController = new LoginController();
        $loginController->registerUser();
        break;
    case 'category':
        $controllerCategory->showCategories(); 
        break;
    case 'postCategory':
        $controllerAdmin->upsertCategories($params[1]); 
        break;
    case'editCategory':
        $controllerAdmin->showCategoriesEditForm($params[1]);
        break;
    case 'deleteCategory':
        $controllerAdmin->deleteCategory($params[1]);
        break;
    case 'productsCategory':
        $controllerCategory->showItemsByCategory($params[1]);
        break;
    case 'postProduct':
        $controllerAdmin->upsertProduct($params[1]);      
        break;  
    case 'productView':
        $controllerProducts->showProduct($params[1]); 
        break;
    case 'deleteProduct':
        $controllerAdmin->deleteProduct($params[1]);
        break;
    case 'editProductForm':
        $controllerAdmin->showProductsEditForm($params[1]);
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}