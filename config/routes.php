<?php

    return array(
        //Home
        '^$' => 'home/index',
        //Account
        '^account$' => 'account/index',
        //News
        '^news\/id=([0-9]+)$' => 'news/item/$1',
        '^news$' => 'news/index'
    );