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
        //получить строку запроса
        $uri = $this->getURI();
        //проверить наличие в файле routes.php
        foreach($this->routes as $uriPattern => $path){
            //срвавниваем есть ли такой путь в наших роутах
            if(preg_match("~$uriPattern~", $uri)){
                //определяем какой контроллер и акшен обрабатывает запрос
                $segments = explode('/', $path);

                $controllerName = ucfirst(array_shift($segments)."Controller");
                $actionName = "action".ucfirst(array_shift($segments));

                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                //создаём объект класса контроллер и вызываем метод
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if($result != null){
                    break;
                }

            }
        }

        //echo $uri;
        //print_r($_SERVER);


    }
}