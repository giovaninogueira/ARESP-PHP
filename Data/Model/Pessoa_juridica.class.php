<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Pessoa_juridica extends Model
{
	use \Data\Traits\Pessoa_juridica;

}

public function salvarPessoaJuridica(){
              $request = Utils::$request;

        $obj = new \Data\Model\Instancia();
        $obj->salvarInstancia();
        $this->setId($obj->lastid());
        $this->setRazao_social($request->razao_social);
        $this->setCnpj($request->cnpj);
        $this->setinscricao_municipal($request->inscricao_municipal);
         $this->setinscricao_estadual($request->inscricao_estadual);
         $this->setNome_social($request->nome_fantasia);

        return $this->lastID();

    }