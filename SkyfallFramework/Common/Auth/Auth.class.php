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
    private $data = array();
    static $key = 'SKYFALL_FRAMEWORK'; // valor padrão

    /**
     * Auth constructor.
     * @param $array
     */
    public function __construct($array)
    {
        $this->data = $array;
        $this->createToken();
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
    private function createToken()
    {
        $this->token = JWT::encode($this->data, Auth::$key);
    }
}