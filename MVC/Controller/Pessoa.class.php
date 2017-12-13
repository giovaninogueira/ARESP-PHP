<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as pessoaModel;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\ORM\ORM;

class Pessoa{

    public function getTbName()
    {
        $obj = new ORM();
        $obj->generateORM();
    }
}