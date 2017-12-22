<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Utils\Utils;

/**
 * Trait Sessions
 * @package SkyfallFramework\Kernel\Traits
 * @details Um Trait para controlar as sessões
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
trait Sessions
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
        Sessions::createSession();
    }

    /**
     * @details Validando token pela index da sessão token
     */
    public static function validateSessionToken()
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
            if(isset($_SESSION['token']))
                if (Utils::$token != $_SESSION['token'])
                    new \SkyfallFramework\Common\Exception\ExceptionFramework(403);
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