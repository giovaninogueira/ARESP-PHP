<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as pessoaModel;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\ORM\ORM;
use SkyfallFramework\Common\Utils\Utils;
use SkyfallFramework\Common\Auth\Auth;

class Pessoa{

    public function getTbName($t)
    {
        $auth = new Auth(
            [
                'iat' => 86400000,
                'nbf' => 86400000,
                'data' => 'User'
            ]
        );
        return $auth;
    }
}