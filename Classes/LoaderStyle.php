<?php

class LoaderStyle
{
    protected $styleData = array('css/bootstrap.min.css');

    public function loadStyle($rootpath)
    {
        //return link tags for css files
        $returnValue = '';

        foreach($this->styleData as $stylesheet) {
            $returnValue = $returnValue . '<link rel="stylesheet" href="' . $rootpath . $stylesheet . '">';
        }
        return $returnValue;
    }
}