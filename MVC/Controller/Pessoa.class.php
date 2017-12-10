<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as pessoaModel;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\CRUD\Model;

class Pessoa{

    public function getTbName()
    {
        $obj = new pessoaModel();
        $obj->setEmail('giovani.cassddianofwfwefwe99@hotmail.com');
        $obj->setNome('Testabdo');
        $obj->save();
        $lastId = $obj->lastID();
        $obj->where('status','=','10','and');
        $obj->where('id','>','15');
        $teste = $obj->selectAll();
    }
}