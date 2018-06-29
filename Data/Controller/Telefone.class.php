<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 
use \SkyfallFramework\Common\Exception\ExceptionFramework;

class Telefone
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
			echo 'oi';
			die;
            $this->validarCampos($param);
            $telefone = new \Data\Model\Telefone();
            $telefone->setNumero($param["numero"]);
            $telefone->setTipo($param["tipo"]);
            $telefone->setCliente_id($param["idCliente"]);
            $telefone->save();
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}

    private function validarCampos($param)
    {
        if(!$param["numero"])
            new ExceptionFramework('O campo numero é obrigatório',422);
        if(!$param["tipo"])
            new ExceptionFramework('O campo tipo é obrigatório',422);
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