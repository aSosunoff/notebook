<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
        //print_r( $this->routes);
        //получить строку запроса
        $this->getURI();


        //echo $uri;
        //print_r($_SERVER);
        //проверить наличие в файле routes.php

    }
}