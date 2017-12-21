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
     * @details Inicia a sessão e realiza as verificações e define o timestamp
     */
    public static function sessionStart($userId, $email)
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
            if(Utils::$token != $_SESSION['token'])
                new \SkyfallFramework\Common\Exception\ExceptionFramework(403);

            self::destroy();

            session_cache_expire(30);
            session_start();
            $new_session_id = session_id();
            $_SESSION['new_session_id'] = $new_session_id;
            $_SESSION['user_id'] = $userId;
            $_SESSION['email_user'] = $email;
            $_SESSION['token'] = Utils::$token;
        }
    }

    public static function createSession()
    {
        session_cache_expire(30);
        session_start();
        $new_session_id = session_id();
        $_SESSION['new_session_id'] = $new_session_id;
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