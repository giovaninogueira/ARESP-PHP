<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Banco as bancoModel;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Banco
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
	    try{
            $banco  = new bancoModel();
            $banco->setNome($param->nome);
            $banco->setNumero($param->numero);
            $banco->setTelefone($param->telefone);
            $banco->save();
            return [
                    "msg"=>"Cadastro efetuado com sucesso",
                    "code"=>201
                ];

        }catch (\Exception $e){
	        new ExceptionFramework(422);
        }
	}
	public function search($param = null)
	{
		try{
		    if(is_null($param)){
                $banco  = new bancoModel();
                $list = $banco->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $banco  = new bancoModel();
                $banco->where('id','=',$param->id);
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
		/*Mehtod PUT HTTP*/
	}
	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

}