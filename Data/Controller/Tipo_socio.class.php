<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Tipo_socio as tipoSocio;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Tipo_socio
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
	    try{
            $tipoSocio = new tipoSocio();
            $tipoSocio->setNome($param["nome"]);
            $tipoSocio->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}

	public function search($param = null)
	{
        try{
            if(!$param){
                $tipoSocio  = new tipoSocio();
                $list = $tipoSocio->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $tipoSocio  = new tipoSocio();
                $tipoSocio->where('id','=',$param["id"]);
                $list = $tipoSocio->select();
                return [
                    'result'=>$list
                ];
            }
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
	}
	public function update($param = null)
	{
        try{
            $tipoSocio = new tipoSocio();
            $tipoSocio->setNome($param["nome"]);
            $tipoSocio->where('id','=',$param["id"]);
            $tipoSocio->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}
	public function delete($param = null)
	{
        try{
            $tipoSocio = new tipoSocio();
            $tipoSocio->where('id','=',$param["id"]);
            $tipoSocio->delete();
            return json_encode(["result"=>"Cadastro deletado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}

}