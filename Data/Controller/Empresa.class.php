<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller;

use Data\Model\Empresa as modelEmpresa;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Empresa
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
		    $empresa = new modelEmpresa();
		    $empresa->setFantasia($param["fantasia"]);
		    $empresa->setRazao($param["razao"]);
		    $empresa->setCnpj($param["cnpj"]);
		    $this->checkCNPJ($empresa);
		    $empresa->save();
            return [
                "msg"=>"Cadastro efetuado com sucesso",
                "code"=>201
            ];
        }catch (\Exception $e){
		    new ExceptionFramework($e->getMessage(),401);
        }
	}
	public function search($param = null)
	{
        try{
            $empresa = new modelEmpresa();
            if(!$param){
                $list = $empresa->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $empresa->where('id','=',$param["id"]);
                $list = $empresa->select();
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
            $empresa = new modelEmpresa();
            $empresa->setFantasia($param["fantasia"]);
            $empresa->setRazao($param["razao"]);
            $empresa->setCnpj($param["cnpj"]);
            $this->checkCNPJ($empresa, $param["id"]);
            $empresa->where('id','=',$param["id"]);
            $empresa->update();
            return [
                "msg"=>"Cadastro atualizado com sucesso",
                "code"=>201
            ];
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),401);
        }
	}
	public function delete($param = null)
	{
        try{
            $empresa = new modelEmpresa();
            $empresa->where('id','=',$param["id"]);
            $empresa->delete();
            return ["result"=>"Cadastro deletado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
	}

    private function checkCNPJ($empresa, $id = 0)
    {
        try {
            $empresa->where('cnpj', '=', $empresa->getCnpj(), 'and')
                ->where('id', '!=', $id);
            $result = $empresa->select();
            if ($result) {
                new ExceptionFramework("o CNPJ já está sendo usado em outro cadastro.");
            }

        } catch (\Exception $e) {
            new ExceptionFramework($e->getMessage());
        }
    }
}