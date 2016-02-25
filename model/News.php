<?php

class News
{
    public static function getNewsList(){
        $connection = DB::getConnection();
        $result = $connection->query("  SELECT
                                          *
                                        FROM
                                          name");

        $newsList = array();
        $i = 0;
        while($row = $result->fetch()){
            $newsList[$i]['ID'] = $row['ID'];
            $newsList[$i]['TEXT'] = $row['TEXT'];
            $i++;
        }

        return $newsList ? $newsList : "Список ещё не заполнен";
    }

    public static function getNewsItemById($id){
        $connection = DB::getConnection();
        $result = $connection->query("  SELECT
                                            ID,
                                            TEXT
                                        FROM
                                            name
                                        WHERE
                                            ID=".$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();

        return $newsItem ? $newsItem : "Такой записи нет";
    }
}