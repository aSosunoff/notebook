<?php

class Link{
    private $links;

    public function __construct()
    {
        $this->links = include(ROOT.'/config/links.php');
    }

    public function GetLinks()
    {
        foreach($this->links as $key => $innerArray){
            switch($key){
                case 'link':
                    foreach($innerArray as $path){
                        echo "<link type='text/css' rel='stylesheet' href='../.." . $path . "'>";
                    }
                    break;
                case 'script':
                    foreach($innerArray as $path){
                        echo "<script type='text/javascript' src='../.." . $path . "'>";
                    }
                    break;
            }
        }
    }
}
