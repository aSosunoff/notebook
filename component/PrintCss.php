<?php

class PrintCss
{
    private $pathCss;

    public function __construct()
    {
        echo $this->pathCss = include(ROOT.'/config/css.php');

    }

    public function getCss(){
        return "<link type=\"text/css\" rel=\"stylesheet\" href=\"../../content/css/reset.css\">";
    }
}