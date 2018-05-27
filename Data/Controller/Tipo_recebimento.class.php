<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Tipo_recebimento as modelTipoRecebimento;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Tipo_recebimento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
        try{
            $tipoRecebimento = new modelTipoRecebimento();
            $tipoRecebimento->setNome($param["nome"]);
            $tipoRecebimento->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $tipoRecebimento  = new modelTipoRecebimento();
                $list = $tipoRecebimento->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $tipoRecebimento  = new modelTipoRecebimento();
                $tipoRecebimento->where('id','=',$param["id"]);
                $list = $tipoRecebimento->select();
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
            $tipoRecebimento = new modelTipoRecebimento();
            $tipoRecebimento->setNome($param["nome"]);
            $tipoRecebimento->where('id','=',$param["id"]);
            $tipoRecebimento->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}
	public function delete($param = null)
	{
        try{
            $tipoRecebimento = new modelTipoRecebimento();
            $tipoRecebimento->where('id','=',$param["id"]);
            $tipoRecebimento->delete();
            return json_encode(["result"=>"Cadastro deletado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}

}