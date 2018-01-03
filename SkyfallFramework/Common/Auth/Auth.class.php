<?php

namespace SkyfallFramework\Common\Auth;

use \Firebase\JWT\JWT;
/**
 * Class Auth
 * @package SkyfallFramework\Common\Auth
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Auth
{
    public $token = "";
    static $key = 'SKYFALL_FRAMEWORK'; // valor padrão

    /**
     * Auth constructor.
     * @param $array
     */
    public function __construct($array)
    {
        $this->createToken($array);
    }

    /**
     * @param $token
     * @return object
     * @details Valida o token
     */
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

    /**
     * @details Função privada que cria token conforme os parametos inseridos
     */
    public function createToken($array)
    {
        $this->token = JWT::encode($array, Auth::$key);
    }
}