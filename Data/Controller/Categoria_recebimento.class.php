<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Categoria_recebimento as catRecebimento;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Categoria_recebimento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
    public function create($param = null)
    {
        try{
            $categoriaRecebimento = new catRecebimento();
            $categoriaRecebimento->setNome($param["nome"]);
            $categoriaRecebimento->save();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
    }
    public function search($param = null)
    {
        try{
            $categoriaRecebimento = new catRecebimento();
            if(!$param){
                $list = $categoriaRecebimento->selectAll();
                return [
                    'result'=>$list
                ];
            }else{
                $categoriaRecebimento->where('id','=',$param["id"]);
                $list = $categoriaRecebimento->select();
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
            $categoriaRecebimento = new catRecebimento();
            $categoriaRecebimento->setNome($param["nome"]);
            $categoriaRecebimento->where('id','=',$param["id"]);
            $categoriaRecebimento->update();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
    }
    public function delete($param = null)
    {
        try{
            $categoriaRecebimento = new catRecebimento();
            $categoriaRecebimento->where('id','=',$param["id"]);
            $categoriaRecebimento->delete();
            return ["result"=>"Cadastro efetuado com sucesso !","code"=>200];
        }catch (\Exception $e){
            new ExceptionFramework(422);
        }
    }

}