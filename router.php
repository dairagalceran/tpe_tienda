<?php

include_once('controllers/AdminUsersController.php');
include_once('controllers/UsersController.php');
include_once('controllers/AdminCategoriesController.php');
include_once('controllers/CategoriesController.php');
include_once('controllers/AdminProductsController.php');
include_once('controllers/ProductsController.php');
include_once('utils/SessionUtils.php');

function forbidden(){
    http_response_code(401);
    echo '401 - No tienes permisos para entrar aqui';
    die();
}

function notFound(){
    http_response_code(404);
    echo '404 - Página no encontrada';
    die();
}

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));

define('ROUTE_CATEGORIES', 'categories');
define('ROUTE_PRODUCTS', 'products');
define('ROUTE_USERS', 'users');

$sessionUtils = new SessionUtils();
$sessionUser = $sessionUtils->getCurrentUser();
$isAdminRoute = false;
$path = ROUTE_PRODUCTS;

if (!empty($_GET['path'])){
    $path = $_GET['path'];
}
$params = explode('/', $path);
$paramsCount = count($params);

if( $params[0] === 'admin'){
    $isAdminRoute = true;
    $paramsCount--;
    array_shift($params);
}

$controllerName = array_shift($params);
$action = 'list';

if($paramsCount > 1) {
    $action = array_shift($params);
}

if($isAdminRoute && (!$sessionUser || !$sessionUser['is_admin'])){
    forbidden();
}

$controller = null;

switch ($controllerName) {
    case ROUTE_USERS:
        $controller = $isAdminRoute ? new AdminUsersController() : new UsersController();
        break;
    case ROUTE_CATEGORIES:
        $controller = $isAdminRoute ? new AdminCategoriesController() : new CategoriesController();
        break;
    case ROUTE_PRODUCTS:
    case 'home':
        $controller = $isAdminRoute ? new AdminProductsController() : new ProductsController();
        break;
}
if($controller){
    $controller->handleAction($action,$params);
}else{
    notFound();
}
