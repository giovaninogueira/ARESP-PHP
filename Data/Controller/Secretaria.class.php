<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Secretaria as modelSecretaria;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Secretaria
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
            $secretaria = new modelSecretaria();
            $secretaria->setNome($param["nome"]);
            $secretaria->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $secretaria  = new modelSecretaria();
                $list = $secretaria->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $secretaria  = new modelSecretaria();
                $secretaria->where('id','=',$param["id"]);
                $list = $secretaria->select();
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
            $secretaria = new modelSecretaria();
            $secretaria->setNome($param["nome"]);
            $secretaria->where('id','=',$param["id"]);
            $secretaria->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $secretaria = new modelSecretaria();
            $secretaria->where('id','=',$param["id"]);
            $secretaria->delete();
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