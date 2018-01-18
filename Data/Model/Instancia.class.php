<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Instancia extends Model
{
	use \Data\Traits\Instancia;

    public function salvarInstancia(){
        $request = Utils::$request;
        $this->setData_cadastro(date("Y/m/d H:i:s"));
        $this->setObs($request->observacao);
        $this->setEmail($request->email);
        $this->validationEmail();
        $this->setData_atualizacao(date("Y/m/d H:i:s"));
        $this->save();
        return $this->lastID();
    }

    public function updateInstancia()
    {
        $request = Utils::$request;
        $this->setObs($request->observacao);
        $this->setEmail($request->email);
        $this->validationEmail();
        $this->setData_atualizacao(date("Y/m/d H:i:s"));
        $this->where('ID','=', $request->id);
        $this->update();
    }

    public function validationEmail() {
        $request = Utils::$request;
        $this->where('email','=',$this->getEmail());
        $result = $this->select();

        if(count($result) !=0 && $result['ID'] != $request->id)
            new ExceptionFramework('Email existe, tente outro',409);
    }

}