<?php

namespace MVC\Controller;

use MVC\Model\Pessoa as pessoaModel;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\CRUD\Model;

class Pessoa{

    public function getTbName()
    {
        $obj = new pessoaModel();
        $obj->setEmail('giovani.cassiano99@hotmail.com');
        $obj->setId(1);
        $obj->setNome('Giovani Cassiano Nogueira');

        Model::$connection->beginTransaction();

        $obj->insert('teste',
            array(
                "nome",
                "email"
            ),
            array(
                "nome"=>"Giovani",
                "email"=>"teste@gmail.com"
            )
        );

        $t = Model::$connection->commit();
    }
}