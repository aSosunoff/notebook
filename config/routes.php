<?php

    return array(
        //Home
        '^$' => 'home/index',
        //News
        '^news\/id=([0-9]+)$' => 'news/view/$1',
        '^news$' => 'news/index',
        '^news\/list$' => 'news/list'
    );