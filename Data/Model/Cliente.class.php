<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Cliente extends Model
{
	use \Data\Traits\Cliente;

}
public function salvarCliente(){
              $request = Utils::$request;

        $obj = new \Data\Model\Pessoa_fisica();
        $obj->salvarPessoaFisica();
        $this->setId($obj->lastid());
        $this->setRg($request->rg);
        $this->setCpf($request->cpf);
	$this->setNome_pai($request->nome_pai);
	$this->setNome_mae($request->nome_mae);
	$this->setData_nascimento($request->data_nascimento);
	

        return $this->lastID();

    }