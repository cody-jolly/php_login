<?php

class LoaderJS
{
    protected $scriptData = array('js/jquery.js', 'js/bootstrap.js', 'js/globalAlertController.js');

    public function loadJS($rootpath)
    {
        //return script tags
        $returnValue = '';

        foreach($this->scriptData as $script) {
            $returnValue = $returnValue . '<script src="' . $rootpath . $script . '" type="text/javascript"></script>';
        }

        return $returnValue;
    }
}