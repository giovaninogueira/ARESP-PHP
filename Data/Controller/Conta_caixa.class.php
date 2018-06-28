<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller;

use Data\Model\Conta_caixa as modelContaCaixa;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Conta_caixa
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
            $contaCaixa = new modelContaCaixa();
            $contaCaixa->setNome($param["nome"]);
            $contaCaixa->setDigito($param["digito"]);
            $contaCaixa->setNumero($param["numero"]);
            $contaCaixa->setTaxa_juros($param["taxa_juros"]);
            $contaCaixa->setTaxa_multa($param["taxa_multa"]);
            $contaCaixa->setTipo($param["tipo"]);
            $contaCaixa->setEmpresa_id($param["empresa"]["id"]);
            $contaCaixa->setAgencia_id($param["agencia"]["id"]);
            $contaCaixa->save();
            return json_encode(["msg"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function search($param = null)
	{
        try{
            $contaCaixa = new modelContaCaixa();
            $empresa = new \Data\Model\Empresa();
            $agencia = new \Data\Model\Agencia();
            $banco = new \Data\Model\Banco();
            $contaCaixa->viewSelect(
                [
                    "id",
                    "numero",
                    "digito",
                    "nome",
                    "taxa_juros",
                    "taxa_multa",
                    "tipo",
                    "empresa_id as empresa",
                    "agencia_id as agencia"
                ]);
            if(!$param){
                $list = $contaCaixa->selectAll();
                foreach ($list as $index => $value){
                    $empresa->where('id','=',$value["empresa"]);
                    $agencia->where('id','=',$value["agencia"]);
                    $agencia->viewSelect([
                        "id","numero","digito","telefone","gerente","banco_id as banco"
                    ]);
                    $resultAgencia = $agencia->select();
                    $resultEmpresa = $empresa->select();
                    $banco->where('id','=',$resultAgencia["banco"]);
                    $resultBanco = $banco->select();
                    $list[$index]["agencia"] = $resultAgencia;
                    $list[$index]["agencia"]["banco"] = $resultBanco;
                    $list[$index]["empresa"] = $resultEmpresa;
                }
                return [
                    'result'=>$list
                ];

            }else{
                $contaCaixa->where('id','=',$param["id"]);
                $list = $contaCaixa->select();
                $empresa->where('id','=',$list["empresa"]);
                $agencia->where('id','=',$list["agencia"]);
                $agencia->viewSelect([
                    "id","numero","digito","telefone","gerente","banco_id as banco"
                ]);
                $resultAgencia = $agencia->select();
                $resultEmpresa = $empresa->select();
                $banco->where('id','=',$resultAgencia["banco"]);
                $resultBanco = $banco->select();
                $list["agencia"] = $resultAgencia;
                $list["agencia"]["banco"] = $resultBanco;
                $list["empresa"] = $resultEmpresa;
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
            $this->validarCampos();
            $contaCaixa = new modelContaCaixa();
            $contaCaixa->setNome($param["nome"]);
            $contaCaixa->setDigito($param["digito"]);
            $contaCaixa->setNumero($param["numero"]);
            $contaCaixa->setTaxa_juros($param["taxa_juros"]);
            $contaCaixa->setTaxa_multa($param["taxa_multa"]);
            $contaCaixa->setTipo($param["tipo"]);
            $contaCaixa->setEmpresa_id($param["empresa"]["id"]);
            $contaCaixa->setAgencia_id($param["agencia"]["id"]);
            $contaCaixa->where('id','=',$param["id"]);
            $contaCaixa->update();
            return ["result"=>$param,"code"=>201];
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
        try{
            $contaCaixa = new modelContaCaixa();
            $contaCaixa->where('id','=',$param["id"]);
            $contaCaixa->delete();
            return json_encode(["msg"=>"Cadastro deletado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            new ExceptionFramework(401);
        }
    }
    
    public function validarCampos()
    {
        $dados = Utils::$request;
        Utils::validateFields($dados['nome'], 'Nome é obrigatório');
        Utils::validateFields($dados['empresa'], 'Empresa é obrigatório');
        Utils::validateFields($dados['empresa']['id'], 'Empresa é obrigatório');
    }
}