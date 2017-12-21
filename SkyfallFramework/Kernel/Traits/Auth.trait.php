<?php

namespace SkyfallFramework\Kernel\Traits;

use \Firebase\JWT\JWT;

/**
 * Trait Auth
 * @package SkyfallFramework\Kernel\Traits
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
trait Auth
{
    public $token = "";
    private $data = array();
    static $key = 'ARESP-PHP_#2018'; // valor padrão

    public function __construct($array)
    {
        $this->data = $array;
        $this->createToken();
    }

    public static function authentication($token)
    {
        try
        {
            return JWT::decode($token, Auth::$key, array('HS256'));
        }
        catch (\Exception $e)
        {
            new \SkyfallFramework\Common\Exception\ExceptionFramework('Token Inválido');
        }
    }

    private function createToken()
    {
        $this->token = JWT::encode($this->data, Auth::$key);
        $_SESSION['token'] = $this->token;
    }

}