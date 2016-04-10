<?php

class Router
{
    private $_routes;

    public function __construct()
    {
        $this->_routes = include(ROOT.'/config/routes.php');
    }

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
            //возвращаем путь где работает скрипт
        }
    }

    private function _setArray($segmentsArray){
        $array = [];
        $viewName = ucfirst(array_shift($segmentsArray));
        $controllerName = $viewName . "Controller";
        $viewLayout = array_shift($segmentsArray);
        $actionName = "action" . ucfirst($viewLayout);
        $parametersArray = $segmentsArray;

        $array['View'] = (
            ['name' => $viewName,
            'layout' => $viewLayout,
            'path' => ROOT . '/view/' . $viewName . '/' . $viewLayout . '.php']
        );

        $array['Controller'] = (
            ['name' => $controllerName,
            'action' => $actionName,
            'path' => ROOT . "/controllers/" . $controllerName . ".php"]
        );

        $array['Parameter'] = $parametersArray;

        return $array;
    }

    public function run(){
        //получить строку запроса
        $uri = $this->getURI();
        //проверить наличие в файле routes.php
        foreach($this->_routes as $uriPattern => $path) {
            //срвавниваем есть ли такой путь в наших роутах
            if (preg_match("~$uriPattern~", $uri)) {
                //определяем какой контроллер и акшен обрабатывает запрос
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $array = $this->_setArray(explode('/', $internalRoute));

                //подключаем файл контроллера
                if (file_exists($array['Controller']['path'])) {
                    include_once($array['Controller']['path']);
                }

                //создаём объект класса контроллера который подключили ранее и вызываем метод
                $controllerObject = new $array['Controller']['name'];

                $result = call_user_func_array(
                    array(
                        $controllerObject,
                        $array['Controller']['action']),
                    $array['Parameter']);

                define('RENDER_BODY', $array['View']['path']);

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