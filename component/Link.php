<?php

class Link{
    private $links;

    public function __construct()
    {
        if(file_exists(ROOT.'/config/links.php')){
            $this->links = include(ROOT.'/config/links.php');
        }
        else{
            $this->links = [];
        }
    }

    public function GetLinks()
    {
        foreach($this->_GetLinksArray() as $arrayLinks){
            echo $arrayLinks;
        }
    }

    private function _GetLinksArray(){
        if(is_array($this->links)){
            $resArrayPath = [];

            foreach($this->links as $key => $innerArray){

                switch($key){
                    case 'link':
                        foreach($innerArray as $path){
                            $resArrayPath[] = "<link type='text/css' rel='stylesheet' href='../.." . $path . "'>";
                        }
                        break;
                    case 'script':
                        foreach($innerArray as $path){
                            $resArrayPath[] = "<script type='text/javascript' src='../.." . $path . "'></script>";
                        }
                        break;
                }
            }
            return $resArrayPath;
        }
        return [];
    }
}
