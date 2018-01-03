<?php

namespace Data\Controller;

use SkyfallFramework\Common\Utils\Utils;

class Pessoa
{

    public function getTbName()
    {
        return "oi";
    }

    public function getSla()
    {
        $t = Utils::$request;
        $obj = new \Data\Model\Pessoa();
        $obj->setNome('Giovani');
        $obj->setId('2');
        $obj->setEmail('giovani.cassiano99@hotmail.com');
        return $obj->convertJson();
    }
}