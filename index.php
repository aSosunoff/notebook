<?php

//$string = "";
//$pattern = "";
//$result = preg_match($pattern, $string);

//FRONT CONTROLLER

//1. общие настройки
    ini_set('display error', 1);
    error_reporting(E_ALL);

//2. подключение файлов системы
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/component/Router.php');
//3. учтановка соединения с БД

//4.Вызов Router
    $router = new Router();
    $router->run();