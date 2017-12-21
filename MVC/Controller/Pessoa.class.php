<?php

namespace MVC\Controller;

use SkyfallFramework\Common\Auth\Auth;

class Pessoa{

    public function getTbName($t)
    {
        $auth = new Auth(
            [
                'iat' => 1000,
                'nbf' => 1000,
                'data' => ['id'=>1,'email'=>'giovani.cassiano99@hotmail.com']
            ]
        );
        $r = $auth->token;
        return $auth;
    }
}