<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as model;

class Pessoa{

    public function getTbName()
    {
        $obj = new model();
        $obj->setEmail('giovani.cassiano99@hotmail.com');
        $obj->setId(1);
        $obj->setNome('Giovani Cassiano Nogueira');
        $result = $obj->getValuesAttibutes();
        $teste = $obj->save();
    }
}