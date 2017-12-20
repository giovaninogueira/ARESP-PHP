<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as pessoaModel;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\ORM\ORM;
use SkyfallFramework\Common\Utils\Utils;

class Pessoa{

    public function getTbName($t)
    {
        $obj = new ORM();
        $teste = Utils::$request;
    }
}