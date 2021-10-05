<?php
require_once 'controllers/CategoryController.php';
require_once 'controllers/ProductsController.php';
require_once 'controllers/AdminController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'home';
}

$params = explode('/', $action);

$controller = new CategoryController();
$controllerProducts = new ProductsController();
$controllerAdmin = new AdminController();

switch ($params[0]) {
    case 'home':
        $controllerProducts->showProducts();
        break; 
    case 'admin':
        $controllerAdmin->showForms();
        break;
     /*   
    case 'borrar':
        $controller->delTask($params[1]);
        break;
    case 'completar':
        $controller->completeTask($params[1]);
        break;
    case 'restore':
        $controller->restoreTask($params[1]);
        break;
        */
    case 'categoria':
        $controller->showCategories();   
        break;
    case 'formCategory':
        $controllerAdmin->createEditCategory($params[1]);   
        break;
    case 'itemsCategory':
        $controller->showItemsCategory($params[1]);
        break;
    case 'deleteCategory':
        $controllerAdmin->deleteCategory($params[1]);   
         break;
    case 'productView':
        $controllerProducts->showProduct($params[1]);   
        break;
        
    default:
        echo '404 - Página no encontrada';
        break;
}