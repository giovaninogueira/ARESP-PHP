<?php

namespace SkyfallFramework\Common\Session;

use SkyfallFramework\Common\Utils\Utils;
use SkyfallFramework\Common\Exception\ExceptionFramework;

/**
 * Class Session
 * @package SkyfallFramework\Common\Sessions
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Session
{
    /**
     * @param array $array
     * @param int $expired
     * @details adiciona as sessões definidas pelo usuário
     */
    public static function createSession($array = array(), $expired = 60)
    {
        self::destroy();
        session_regenerate_id(true);
        session_cache_expire($expired);
        ob_start();
        session_start();
        $new_session_id = session_id();
        $_SESSION['new_session_id'] = $new_session_id;

        if(count($array) != 0)
        {
            foreach ($array as $index => $value)
            {
                $_SESSION[$index] = $value;
            }
        }
    }

    /**
     * @details validar session (chamando a função CreateSession)
     */
    public static function validationSession()
    {
        ob_start();
        session_start();
        if(!isset($_SESSION['new_session_id']))
            new ExceptionFramework('Sessão inválida',401);
    }

    /**
     * @details Validando token pela index da sessão token
     */
    public static function validateSessionToken()
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            ob_start();
            session_start();
            if(isset($_SESSION['token']))
                if (Utils::$token != $_SESSION['token'])
                    new ExceptionFramework(401);
        }
    }

    /**
     * @details Limpa as variavéis globais Session e Cookie
     */
    public static function destroy()
    {
        unset($_SESSION);
        unset($_COOKIE);
        session_destroy();
    }
}