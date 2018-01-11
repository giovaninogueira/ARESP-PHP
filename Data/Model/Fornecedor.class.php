<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Fornecedor extends Model
{
	use \Data\Traits\Fornecedor;

}
public function salvarFornecedor(){

	$obj = new \Data\Model\Pessoa_juridica();
        $obj->salvarPessoaJuridica();
}