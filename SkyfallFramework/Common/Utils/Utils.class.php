<?php

namespace SkyfallFramework\Common\Utils;

/**
 * Class Utils
 * @package SkyfallFramework\Common\Utils
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Utils
{
    /**
     * @var mixed|null
     */
    static $request = null;
    /**
     * @var null
     */
    static $token = null;
    /**
     * @var array|false|null
     */
    static $header = null;

    /**
     * Utils constructor.
     */
    public static function configure()
    {
        $result = file_get_contents('php://input');

        if(count($_REQUEST) != 0)
        {
            self::$request = json_decode($result);
        }
        else
        {
            self::$request = (object)$_REQUEST;
        }
    }

    /**
     * @param $header
     */
    public static function addHeaders($header = null)
    {
        if(!is_null($header))
            header($header);
        else
            Utils::headerDefault();
    }

    /**
     * @details Header de retorno padrão
     */
    private static function headerDefault()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
    }
}