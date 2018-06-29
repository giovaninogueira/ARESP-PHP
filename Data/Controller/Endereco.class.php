<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;

class Endereco
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
            $endereco = new \Data\Model\Endereco();
            $endereco->setBairro($param["bairro"]);
            $endereco->setCep($param["cep"]);
            $endereco->setCidade($param["cidade"]);
            $endereco->setComplemento($param["complemento"]);
            $endereco->setEstado($param["estado"]);
            $endereco->setLogradouro($param["logradouro"]);
            $endereco->setNumero($param["numero"]);
            $endereco->save();
            $lastIdEnd = $endereco->lastID();
            return $lastIdEnd;
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage());
        }
	}

	private function validarCampos($param)
    {
        if(!$param["cep"])
            new ExceptionFramework('O campo CEP é obrigatório',422);
        if(!$param["logradouro"])
            new ExceptionFramework('O campo logradouro é obrigatório',422);
        if(!$param["numero"])
            new ExceptionFramework('O campo numero é obrigatório',422);
        if(!$param["bairro"])
            new ExceptionFramework('O campo bairro é obrigatório',422);
        if(!$param["cidade"])
            new ExceptionFramework('O campo cidade é obrigatório',422);
        if(!$param["estado"] || strlen($param["estado"]) >2 || strlen($param["estado"]) <2)
            new ExceptionFramework('O campo estado é obrigatório e só deve ter apenas dois caracteres',422);
    }
	public function search($param = null)
	{

	}
	public function update($param = null)
	{
		try{
            $this->validarCampos($param);
            $endereco = new \Data\Model\Endereco();
            $endereco->setBairro($param["bairro"]);
            $endereco->setCep($param["cep"]);
            $endereco->setCidade($param["cidade"]);
            $endereco->setComplemento($param["complemento"]);
            $endereco->setEstado($param["estado"]);
            $endereco->setLogradouro($param["logradouro"]);
            $endereco->setNumero($param["numero"]);
            $endereco->where('id','=',$param['id']);
            $endereco->update();
            $lastIdEnd = $endereco->lastID();
            return $lastIdEnd;
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

}