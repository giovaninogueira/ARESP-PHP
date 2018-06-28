<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use Data\Model\Convenio as modelConvenio;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Convenio
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
            $convenio = new modelConvenio();
            $convenio->setNome($param["nome"]);
            $convenio->setNumero($param["numero"]);
            $convenio->setTelefone($param["telefone"]);
            $convenio->setConta_caixa_id($param["conta_caixa_id"]);
            $convenio->setObservacao($param["observacao"]);
            $convenio->save();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !"]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            $convenio  = new modelConvenio();
            $contaCaixa = new \Data\Model\Conta_caixa();
            $convenio->viewSelect(
                [
                    "id",
                    "nome",
                    "numero",
                    "telefone",
                    "observacao",
                    "conta_caixa_id as conta"
                ]
            );
            if(!$param){
                $list = $convenio->selectAll();
                foreach ($list as $index=> $value){
                    $contaCaixa->where('id','=',$value['conta']);
                    $result = $contaCaixa->select();
                    $list[$index]["conta"] = $result;
                }
                return [
                    'result'=>$list
                ];
            }else{
                $convenio  = new modelConvenio();
                $convenio->where('id','=',$param["id"]);
                $list = $convenio->select();
                $contaCaixa->where('id','=',$list['conta']);
                $result = $contaCaixa->select();
                $list["conta"] = $result;
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
            $convenio = new modelConvenio();
            $convenio->setNome($param["nome"]);
            $convenio->setNumero($param["numero"]);
            $convenio->setTelefone($param["telefone"]);
            $convenio->setConta_caixa_id($param["conta_caixa_id"]);
            $convenio->setObservacao($param["observacao"]);
            $convenio->where('id','=',$param["id"]);
            $convenio->update();
            return json_encode(["result"=>"Cadastro atualizado com sucesso !"]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $convenio = new modelConvenio();
            $convenio->where('id','=',$param["id"]);
            $convenio->delete();
            return json_encode(["result"=>"Cadastro deletado com sucesso !"]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
    }
    
    public function validarCampos()
    {
        $dados = Utils::$request;
        Utils::validateFields($dados['nome'], 'Número é obrigatório');
        Utils::validateFields($dados['numero'], 'Banco é obrigatório');
    }
}