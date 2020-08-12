<?php
class LoaderMeta
{
    protected $metaData = array('<meta charset="UTF-8">', '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">', '<meta http-equiv="X-UA-Compatible" content="ie=edge">');

    public function loadMeta()
    {
        //return meta tags
        $returnValue = '';

        foreach($this->metaData as $metaTag) {
            $returnValue = $returnValue . $metaTag;
        }
        return $returnValue;
    }
}