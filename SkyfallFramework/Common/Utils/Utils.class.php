<?php

namespace SkyfallFramework\Common\Utils;

class Utils
{
    static $request = null;

    public function __construct()
    {
        $result = file_get_contents('php://input');
        if(count($_REQUEST) != 0)
        {
            self::$request = (object)$_REQUEST;
        }
        else
        {
            self::$request = json_decode($result);
        }
    }
}