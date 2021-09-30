<?php
require_once 'controllers/classController.php';

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

switch ($params[0]) {
    case 'home':
        $controller->showClasses();
        break;
        /*
    case 'insertar':
        $controller->addTask();
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
    case 'taskView':
        $controller->showTask($params[1]);   
        break;
        */
    default:
        echo '404 - Página no encontrada';
        break;
}