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
    define('ROOT', $_SERVER['DOCUMENT_ROOT']);
    //define('ROOT', dirname(__FILE__));
    //определяем именованную константу в которой путь корня сайта
    require_once(ROOT.'/component/Router.php');

//3. учтановка соединения с БД
//    $connection = mysqli_connect('localhost', 'h93874_alex', '9inttostr321!@', 'h93874_db_name') or die ('Невозможно подключиться в БД');
//    $res = $connection->query("SELECT * FROM name");
//    while($row = mysqli_fetch_array($res)) {
//        echo $row['ID'] . " " . $row['TEXT'] . "<br/>";
//    }
//    $connection->close();


//4.Вызов Router
    $router = new Router();
    $router->run();
