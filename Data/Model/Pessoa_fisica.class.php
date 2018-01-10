<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Pessoa_fisica extends Model
{
	use \Data\Traits\Pessoa_fisica;

}
public function salvarPessoaFisica(){
              $request = Utils::$request;

        $obj = new \Data\Model\Instancia();
        $obj->salvarInstancia();
        $this->setId($obj->lastid());
        $this->setNome($request->nome);

        

    }