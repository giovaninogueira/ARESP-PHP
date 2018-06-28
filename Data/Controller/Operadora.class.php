<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Operadora as modelOperadora;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Operadora
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
            $operadora = new modelOperadora();
            $operadora->setNome($param["nome"]);
            $operadora->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $operadora  = new modelOperadora();
                $list = $operadora->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $operadora  = new modelOperadora();
                $operadora->where('id','=',$param["id"]);
                $list = $operadora->select();
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
            $operadora = new modelOperadora();
            $operadora->setNome($param["nome"]);
            $operadora->where('id','=',$param["id"]);
            $operadora->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $operadora = new modelOperadora();
            $operadora->where('id','=',$param["id"]);
            $operadora->delete();
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