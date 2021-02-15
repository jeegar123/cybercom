<?php




class Front
{

    public static function init()
    {
        $controllerName = ucfirst($_GET['c']);
        $actionName = $_GET['a'].'Action';
        require_once "./Controller/{$controllerName}.php";
        $controller = new $controllerName();
        $controller->$actionName();
    }
}
