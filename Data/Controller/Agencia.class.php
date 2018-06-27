<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Agencia as agModel;
use Data\Model\Banco;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Agencia
{
    
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
    **/
    
	public function create($param = null)
	{
	    try{
            $agencia = new agModel();
            $this->validarCampos();
            $agencia->setNumero($param["numero"]);
            $agencia->setGerente($param["gerente"]);
            $agencia->setTelefone($param["telefone"]);

            if(strlen($param["digito"])>1)
                new ExceptionFramework('O digito deve ter apenas um caracter');

            $agencia->setDigito($param["digito"]);
            $agencia->setBanco_id($param["banco"]["id"]);
            $agencia->save();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>201];
        }catch (\Exception $e){
	        new ExceptionFramework($e->getMessage(),401);
        }
    }
    
    public function validarCampos()
    {
        $dados = Utils::$request;
        if(\is_null($dados['numero']) || !$dados['numero']){
            new ExceptionFramework('Número é obrigatório',422);
        }
        if(\is_null($dados['banco']) || !$dados['banco'] || !$dados["banco"]["id"]){
            new ExceptionFramework('Banco é obrigatório',422);
        }
    }

	public function search($param = null)
	{
        try{
            $agencia = new agModel();
            $banco = new Banco();
            $agencia->viewSelect([
                "id","numero","digito","telefone","gerente","banco_id as banco"
            ]);
            if(!$param){
                $list = $agencia->selectAll();
                /**
                 * @details Recuperar o id do banco
                 */
                foreach ($list as $index => $value){
                    $banco->where('id','=',$value["banco"]);
                    $res = $banco->select();
                    $value["banco"] = array();
                    $list[$index]["banco"] = $res;
                }

                return [
                    'result'=>$list
                ];

            }else{

                $agencia->where('id','=',$param["id"]);
                $list = $agencia->select();
                /**
                 * @details Recuperar o id do banco
                 */
                $banco->where('id','=',$list["banco"]);
                $idBanco = $list["banco"];
                $res = $banco->select();
                $list["banco"] = array();
                $list["banco"] = $res;

                return [
                    'result'=>$list
                ];
            }
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
    }
    
	public function update($param = null)
	{
		try{
            $agencia = new agModel();
            $this->validarCampos();
            $agencia->setNumero($param["numero"]);
            $agencia->setGerente($param["gerente"]);
            $agencia->setTelefone($param["telefone"]);

            if(strlen($param["digito"])>1)
                new ExceptionFramework('O digito deve ter apenas um caracter');

            $agencia->setDigito($param["digito"]);
            $agencia->setBanco_id($param["banco"]["id"]);
            $agencia->where('id','=',$param["id"]);
            $agencia->update();
            return ["result"=>"Cadastro atualizado com sucesso !","code"=>200];

        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
    }
    
	public function delete($param = null)
	{
		try{
		    $agencia = new agModel();
		    $agencia->where('id','=',$param["id"]);
		    $agencia->delete();
            return ["result"=>"Cadastro deletado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
	}
}