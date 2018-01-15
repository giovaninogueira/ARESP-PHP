<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Utils\Utils;

class Empresa extends Model
{
	use \Data\Traits\Empresa;

	public function saveEmpresa()
    {
        $request = Utils::$request;
        $obj = $this->getPessoa_juridica();
        $id = $obj->salvarPessoaJuridica();
        $this->setPessoa_juridica_id($id);
        $this->setConvenio_id($request->convenio_id);
        $this->save();
    }
}