<?php

class DB
{
    public static function getConnection(){
        $params = include ROOT.'/config/db_params.php';
        $connection = new PDO("mysql:host={$params['host']};dbname={$params['db_name']}", $params['user'], $params['password'] );

        return $connection;
        //3. учтановка соединения с БД
//    $connection = mysqli_connect('localhost', 'h93874_alex', '9inttostr321!@', 'h93874_db_name') or die ('Невозможно подключиться в БД');
//    $res = $connection->query("SELECT * FROM name");
//    while($row = mysqli_fetch_array($res)) {
//        echo $row['ID'] . " " . $row['TEXT'] . "<br/>";
//    }
//    $connection->close();
    }
}