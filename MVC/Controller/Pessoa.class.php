<?php

namespace MVC\Controller;

use SkyfallFramework\Common\Auth\Auth;

class Pessoa{

    public function getTbName()
    {
        $obj = new \MVC\Model\Pessoa();
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
}