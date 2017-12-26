<?php

namespace MVC\Controller;

use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Utils\Utils;

class Pessoa{

    public function getTbName()
    {
        $obj = new \MVC\Model\Pessoa();
        $t = Utils::$request;
        $obj->setNome('giovani');
        $obj->setId('1');
        $obj->setEmail('fdwefwe');
        $auth = new Auth(
            [
                'iat' => 1000,
                'nbf' => 1000,
                'data' => ['id'=>1,'email'=>'giovani.cassiano99@hotmail.com']
            ]
        );
        $r = $auth->token;
        $result[] = "teste";
        $result[] = "tesdqwdqwte";
        $result[] = "7897";
        return $result;
    }

    public function getSla()
    {
        $t = Utils::$request;
    }
}