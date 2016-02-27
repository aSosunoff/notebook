<?php

include_once ROOT.'/model/News.php';
define('VIEW_NEWS',ROOT.'/view/News/');

class NewsController
{
    public function actionIndex(){
        $newsList = News::getNewsList();
        //require_once(VIEW_NEWS.'/index.php');
//        echo "<pre>";
//        print_r($newsList);
//        echo "</pre>";
        return $newsList;
    }

    public function actionItem($id){
        $newsItem = News::getNewsItemById($id);
        echo "<pre>";
        print_r($newsItem);
        echo "</pre>";
        return true;
    }
}