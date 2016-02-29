<?php

include_once ROOT.'/model/News.php';

class NewsController
{
    public function actionIndex(){
        $newsList = News::getNewsList();
        return $newsList;
    }

    public function actionItem($id){
        $newsItem = News::getNewsItemById($id);
        return $newsItem;
    }
}