<?php


//FRONT CONTROLLER

//1. общие настройки
    if(!ini_get('display_errors')){
        ini_set('display_errors', 1);
        //установка значения заданной настройки конфигурации
        //говорим о том что бы ошибки выводились на экран вместе с остальным выводом
        error_reporting(E_ALL);
        //выводим все ошибки
    }

//2. подключение файлов системы
    define('ROOT', dirname(__FILE__));
    //определяем именованную константу в которой путь корня сайта
    require_once(ROOT.'/component/Router.php');
    require_once(ROOT.'/component/DB.php');


//4.Вызов Router
    $router = new Router();
    $router->run();
