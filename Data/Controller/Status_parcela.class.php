<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Status_parcela as modelStatusParcela;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Status_parcela
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
            $statusParcela = new modelStatusParcela();
            $statusParcela->setNome($param["nome"]);
            $statusParcela->setDescricao($param["descricao"]);
            $statusParcela->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $statusParcela  = new modelStatusParcela();
                $list = $statusParcela->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $statusParcela  = new modelStatusParcela();
                $statusParcela->where('id','=',$param["id"]);
                $list = $statusParcela->select();
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
            $statusParcela = new modelStatusParcela();
            $statusParcela->setNome($param["nome"]);
            $statusParcela->setDescricao($param["descricao"]);
            $statusParcela->where('id','=',$param["id"]);
            $statusParcela->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $statusParcela = new modelStatusParcela();
            $statusParcela->where('id','=',$param["id"]);
            $statusParcela->delete();
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