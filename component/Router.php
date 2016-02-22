<?php

class Router
{
    private $routes;

    public function d($s){
        echo "<pre>";
        print_r($s);
        echo "</pre>";
    }

    public function __construct()
    {
        $this->routes = include(ROOT.'/config/routes.php');
    }

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            //$this->d();
            return trim($_SERVER['REQUEST_URI'], '/');
            //возвращаем путь где работает скрипт
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
            //$this->d($segments);
                $controllerName = ucfirst(array_shift($segments)."Controller");
                $actionName = "action".ucfirst(array_shift($segments));

                //подключаем файл контроллера
                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                //создаём объект класса контроллера который подключили ранее и вызываем метод
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