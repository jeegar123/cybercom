<?php


class Admin
{
    public function redirect($actionName = null, $controllerName = null)
    {
        if (!$controllerName)
            $controllerName = $_GET['c'];
        if (!$actionName)
            $actionName = $_GET['a'];

        header("location:{$this->getUrl($actionName,$controllerName)}");
    }

    public function getUrl($actionName = null, $controllerName = null)
    {
        if (!$controllerName)
            $controllerName = $_GET['c'];
        if (!$actionName)
            $actionName = $_GET['a'];
        return "http://localhost/cybercom/practice/16-02-2021/ecommerce-application-practice/index.php?c={$controllerName}&a={$actionName}";
    }
}
