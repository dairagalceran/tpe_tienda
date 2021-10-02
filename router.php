<?php
require_once 'controllers/classController.php';
require_once 'controllers/productsController.php';



// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'home';
}

$params = explode('/', $action);

$controller = new ClassController();
$controllerProducts = new ProductsController();

switch ($params[0]) {
    case 'home':
        $controllerProducts->showProducts();
        break;
     /*   
    case 'register':
        $controller->registerUser();
        break;
        
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
        $controller->showClasses();   
        break;
    case 'formCategory':
        $controller->createEditClass($params[1]);   
        break;
     case 'deleteCategory':
        $controller->deleteClass($params[1]);   
         break;
    case 'productView':
        $controllerProducts->showProduct($params[1]);   
        break;
        
    default:
        echo '404 - Página no encontrada';
        break;
}