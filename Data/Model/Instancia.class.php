<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Instancia extends Model
{
	use \Data\Traits\Instancia;

}

public function salvarInstancia(){

        $request = Utils::$request;
        
        $this->setData_cadastro(date("Y/m/d H:i:s"));
        $this->setObservacao($request->observacao);
        $this->setEmail($request->email);
        $this->setData_atalizacao(date("Y/m/d H:i:s")
        );
        $this->save();

        return $this->lastID();

    }