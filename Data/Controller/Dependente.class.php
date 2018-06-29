<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;

class Dependente
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
        try{
            $this->validarCampos($param);
            $dependente = new \Data\Model\Dependente();
            $dependente->setNascimento(date('Y-m-d h:i:s',strtotime($param["nascimento"])));
            $dependente->setNome($param["nome"]);
            $dependente->setParentesco($param["parentesco"]);
            $dependente->setRg($param["rg"]);
            $dependente->setCliente_id($param["idCliente"]);
            $dependente->save();
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
    private function validarCampos($param)
    {
        if(!$param["nome"])
            new ExceptionFramework('O campo nome é obrigatório',422);
        if(!$param["parentesco"])
            new ExceptionFramework('O campo parentesco é obrigatório',422);
        if(!$param["nascimento"])
            new ExceptionFramework('O campo nascimento é obrigatório',422);
    }
	public function search($param = null)
	{
		/*Mehtod GET HTTP*/
	}
	public function update($param = null)
	{
		/*Mehtod PUT HTTP*/
	}
	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

}