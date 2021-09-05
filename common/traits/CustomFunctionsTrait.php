<?php

namespace common\traits;

trait CustomFunctionsTrait
{
    public static function in_array_r($item, $array)
    {
        return preg_match('/"'.$item.'"/i' , json_encode($array));
    }
}
