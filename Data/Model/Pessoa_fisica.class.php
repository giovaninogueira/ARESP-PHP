<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Utils\Utils;

class Pessoa_fisica extends Model
{
	use \Data\Traits\Pessoa_fisica;

    public function salvarPessoaFisica()
    {
        $request = Utils::$request;
        $obj = new Instancia();
        $obj->salvarInstancia();
        $this->setInstancia_id($obj->lastid());
        $this->setNome($request->nome);
        return $this->lastID();
    }
}