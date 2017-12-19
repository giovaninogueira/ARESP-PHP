<?php

namespace SkyfallFramework\Kernel\Traits;

/**
 * Trait Sessions
 * @package SkyfallFramework\Kernel\Traits
 * @details Um Trait para controlar as sessões
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
trait Sessions
{

    /**
     * Sessions constructor.
     */
    public function __construct()
    {
        $this->sessionStart();
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

    /**
     * @details Inicia a sessão e realiza as verificações e define o timestamp
     */
    private function sessionStart()
    {
        session_start();
        if(isset($_SESSION['destroyed']))
            $this->validation();
        else
        {
            $new_session_id = session_id();
            $_SESSION['new_session_id'] = $new_session_id;
            $_SESSION['destroyed'] = time();
        }
    }

    /**
     * @details Faz as verificações para ver se a session está valida
     */
    private function validation()
    {
        if(isset($_SESSION['destroyed'])
                && $_SESSION['destroyed'] < time() - 300 )
        {
            Sessions::destroy();
            new \SkyfallFramework\Common\Exception\ExceptionFramework(403);
        }

        if(isset($_SESSION['new_session_id']))
        {
            session_commit();
            session_id($_SESSION['new_session_id']);
            session_start();
            return;
        }
    }
}