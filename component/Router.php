<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include(ROOT.'/config/routes.php');
    }

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
            //возвращаем путь где работает скрипт
        }
    }

    public function run(){
        //получить строку запроса
        $uri = $this->getURI();
        //проверить наличие в файле routes.php
        foreach($this->routes as $uriPattern => $path) {
            //срвавниваем есть ли такой путь в наших роутах
            if (preg_match("~$uriPattern~", $uri)) {
                //определяем какой контроллер и акшен обрабатывает запрос
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segmentsArray = explode('/', $internalRoute);

                $viewName = ucfirst(array_shift($segmentsArray));
                $controllerName =  $viewName . "Controller";

                $viewLayout = array_shift($segmentsArray);
                $actionName = "action" . ucfirst($viewLayout);

                $parametersArray = $segmentsArray;

                //подключаем файл контроллера
                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //создаём объект класса контроллера который подключили ранее и вызываем метод
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parametersArray);


                define('RENDER_BODY', ROOT . '/view/' . $viewName . '/' . $viewLayout . '.php');

                if(file_exists(MASTER_PAGE)){
                    include_once(MASTER_PAGE);
                }
                else{ echo 'Ошибочка отображения'; }

                if ($result != null) {
                    break;
                }


            }
        }
    }
}