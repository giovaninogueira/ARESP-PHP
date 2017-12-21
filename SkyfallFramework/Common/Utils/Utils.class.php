<?php

namespace SkyfallFramework\Common\Utils;

/**
 * Class Utils
 * @package SkyfallFramework\Common\Utils
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Utils
{
    static $request = null;
    static $token = null;

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