<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Grupo_recebimento as modelGrupo;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Grupo_recebimento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
        try{
            $this->validarCampos();
            $grupo = new modelGrupo();
            $grupo->setNome($param["nome"]);
            $grupo->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $grupo  = new modelGrupo();
                $list = $grupo->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $grupo  = new modelGrupo();
                $grupo->where('id','=',$param["id"]);
                $list = $grupo->select();
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
            $this->validarCampos();
            $grupo = new modelGrupo();
            $grupo->setNome($param["nome"]);
            $grupo->where('id','=',$param["id"]);
            $grupo->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $grupo = new modelGrupo();
            $grupo->where('id','=',$param["id"]);
            $grupo->delete();
            return json_encode(["result"=>"Cadastro deletado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
    }
    
    public function validarCampos()
    {
        $dados = Utils::$request;
        Utils::validateFields($dados['nome'], 'Nome é obrigatório');
    }
}