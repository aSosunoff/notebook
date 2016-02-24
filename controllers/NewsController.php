<?php

class NewsController
{
    public function actionIndex(){
        echo "Просмотр списка новостей";
        return true;
    }

    public function actionView($id){
        echo "Просмотр одной новости = $id";
        return true;
    }

    public function actionList(){
        echo "List";
        return true;
    }
}