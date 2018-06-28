<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 
use Data\Model\Categoria_pagamento as catPagModel;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Categoria_pagamento
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
		    $categoriaPagamento = new catPagModel();
            $categoriaPagamento->setNome($param["nome"]);
            $categoriaPagamento->save();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
		    new ExceptionFramework(422);
        }
	}
	public function search($param = null)
	{
        try{
            $categoriaPagamento = new catPagModel();
            if(!$param){
                $list = $categoriaPagamento->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $categoriaPagamento->where('id','=',$param["id"]);
                $list = $categoriaPagamento->select();
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
            $categoriaPagamento = new catPagModel();
            $categoriaPagamento->setNome($param["nome"]);
            $categoriaPagamento->where('id','=',$param["id"]);
            $categoriaPagamento->update();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $categoriaPagamento = new catPagModel();
            $categoriaPagamento->where('id','=',$param["id"]);
            $categoriaPagamento->delete();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
    }
    
    public function validarCampos()
    {
        $dados = Utils::$request;
        Utils::validateFields($dados['nome'], 'Nome é obrigatório');
    }

}