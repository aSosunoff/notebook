<?php

include_once ROOT.'/model/News.php';

class NewsController
{
    public function actionIndex(){
        $newsList = array();
        $newsList = News::getNewsList();
        echo "<pre>";
        print_r($newsList);
        echo "</pre>";
        return true;
    }

    public function actionItem($id){
        $newsItem = News::getNewsItemById($id);
        echo "<pre>";
        print_r($newsItem);
        echo "</pre>";
        return true;
    }
}