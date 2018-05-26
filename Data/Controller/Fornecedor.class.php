<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller;

use Data\Model\Fornecedor as modelForncedor;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Fornecedor
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
	    try{
            $fornecedor = new modelForncedor();
            $fornecedor->setTelefone($param["telefone"]);
            $fornecedor->setCadastro(date("Y-m-d H:i:s"));
            $fornecedor->setCnpj($param["cnpj"]);
            $fornecedor->setEmail($param["email"]);
            $fornecedor->setRazao($param["razao"]);
            $fornecedor->setFantasia($param["fantasia"]);
            $fornecedor->setContato($param["contato"]);
            $this->checkEmailAndCNPJ($fornecedor);
            $fornecedor->save();
            return [
                "msg"=>"Cadastro efetuado com sucesso",
                "code"=>201
            ];
        }catch (\Exception $e){
	        new ExceptionFramework(401);
        }
	}
	public function search($param = null)
	{
        try{
            if(!$param){
                $banco  = new modelForncedor();
                $list = $banco->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $banco  = new modelForncedor();
                $banco->where('id','=',$param["id"]);
                $list = $banco->select();
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
            $fornecedor = new modelForncedor();
            $fornecedor->setTelefone($param["telefone"]);
            $fornecedor->setCadastro(date("Y-m-d H:i:s"));
            $fornecedor->setCnpj($param["cnpj"]);
            $fornecedor->setEmail($param["email"]);
            $fornecedor->setRazao($param["razao"]);
            $fornecedor->setFantasia($param["fantasia"]);
            $fornecedor->setContato($param["contato"]);
            $fornecedor->setId($param["id"]);
            $this->checkEmailAndCNPJ($fornecedor, $fornecedor->getId());
            $fornecedor->where('id','=',$param["id"]);
            $fornecedor->update();
            return [
                "msg"=>"Cadastro atualizado com sucesso",
                "code"=>200
            ];
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),401);
        }
	}
	public function delete($param = null)
	{
        try{
            $fornecedor = new modelForncedor();
            $fornecedor->where('id','=',$param["id"]);
            $fornecedor->delete();
            return ["result"=>"Cadastro deletado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}

	private function checkEmailAndCNPJ($fornecedor, $id = 0)
    {
        try{
            $fornecedor->where('email','=',$fornecedor->getEmail(),'and')
                ->where('id','!=',$id);
            $listResult = $fornecedor->select();

            if($listResult){
                new ExceptionFramework("Email já está sendo usado em outro cadastro.");
            }

            $fornecedor->where('cnpj','=',$fornecedor->getCnpj(),'and')
                ->where('id','!=',$id);
            $result = $fornecedor->select();

            if($result){
                new ExceptionFramework("o CNPJ já está sendo usado em outro cadastro.");
            }

        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage());
        }
    }

}