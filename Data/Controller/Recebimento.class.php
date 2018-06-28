<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;

class Recebimento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
            $valorDiv = $param['valor'] / $param['ocorrencia'];
            $newDate = null;
            $num = strtotime(date('Y-m-d H:i:s'));
            for($i = 0; $i < $param['ocorrencia']; $i++){
                if(!$newDate){
                    $newDate = date('Y-m-d', strtotime("+1 month", strtotime($param["dtVencimento"])));
                }else{
                    $newDate = date('Y-m-d', strtotime("+1 month", strtotime($newDate)));
                }
                $receber = new \Data\Model\Recebimento();
                $receber->setCategoria_recebimento_id($param['categoria']['id']);
                $receber->setCliente_id($param['cliente']['id']);
                $receber->setConta_caixa_id($param['conta']['id']);
                $receber->setDescricao($param['descricao']);
                $receber->setDt_compentencia($param["dtCompetencia"]);
                $receber->setDt_emissao(date ("Y-m-d"));
                $receber->setDt_vencimento($newDate);
                $receber->setGrupo_recebimento_id($param['grupo']['id']);
                $receber->setOcorrencia($param['ocorrencia']);
                $receber->setRemessa_gerada(0);
                $receber->setValor($valorDiv);
                $receber->setStatus_parcela_id(1);
                $receber->save();
            }
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
	public function search($param = null)
	{
        $receber = new \Data\Model\Recebimento();
        $receber->viewSelect(
            [
                'id',
                'categoria_recebimento_id as categoria',
                'cliente_id as cliente',
                'conta_caixa_id as conta',
                'descricao',
                'DT_COMPENTENCIA as dtCompetencia',
                'dt_emissao as dtEmissao',
                'dt_vencimento as dtVencimento',
                'grupo_recebimento_id as grupo',
                'ocorrencia',
                'remessa_gerada as remessaGerada',
                'status_parcela_id as situacao',
                'valor'
            ]
        );
        try{
            if($param){
                $receber->where('id','=',$param['id']);
                $list = $receber->selectAll(1)[0];

                $list['dtCompetencia'] = $list['dtcompetencia'];
                $list['dtEmissao'] = $list['dtemissao'];
                $list['dtVencimento'] = $list['dtvencimento'];
                unset($list['dtcompetencia']);
                unset($list['dtemissao']);
                unset($list['dtvencimento']);

                $categoria = new \Data\Model\Categoria_recebimento();
                $categoria->where('id','=',$list['categoria']);
                $list['categoria'] = $categoria->select();
                //$list['valor'] = $list['valor'] * $list['ocorrencia'];
                $cliente = new \Data\Model\Cliente();
                $cliente->where('id','=',$list['cliente']);
                $list['cliente'] = $cliente->select();

                $conta = new \Data\Model\Conta_caixa();
                $conta->where('id','=',$list['conta']);
                $list['conta'] = $conta->select();

                $grupo = new \Data\Model\Grupo_recebimento();
                $grupo->where('id','=',$list['grupo']);
                $list['grupo'] = $grupo->select();

                $status = new \Data\Model\Grupo_recebimento();
                $status->where('id','=',$list['situacao']);
                $list['situacao'] = $status->select();
                return [
                    'result'=>$list
                ];
            }else{
                $list = $receber->selectAll();
                foreach ($list as $index=> $value){

                    $list[$index]['dtCompetencia'] = $value['dtcompetencia'];
                    $list[$index]['dtEmissao'] = $value['dtemissao'];
                    $list[$index]['dtVencimento'] = $value['dtvencimento'];

                    $categoria = new \Data\Model\Categoria_recebimento();
                    $categoria->where('id','=',$value['categoria']);
                    $list[$index]['categoria'] = $categoria->select();

                    $cliente = new \Data\Model\Cliente();
                    $cliente->where('id','=',$value['cliente']);
                    $list[$index]['cliente'] = $cliente->select();

                    $conta = new \Data\Model\Conta_caixa();
                    $conta->where('id','=',$value['conta']);
                    $list[$index]['conta'] = $conta->select();

                    $grupo = new \Data\Model\Grupo_recebimento();
                    $grupo->where('id','=',$value['grupo']);
                    $list[$index]['grupo'] = $grupo->select();

                    $status = new \Data\Model\Grupo_recebimento();
                    $status->where('id','=',$value['situacao']);
                    $list[$index]['situacao'] = $status->select();
                }
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
            $num = strtotime(date('Y-m-d H:i:s'));
            $receber = new \Data\Model\Recebimento();
            $receber->setCategoria_recebimento_id($param['categoria']['id']);
            $receber->setCliente_id($param['cliente']['id']);
            $receber->setConta_caixa_id($param['conta']['id']);
            $receber->setDescricao($param['descricao']);
            $receber->setDt_compentencia($param["dtCompetencia"]);
            $receber->setDt_emissao(date ("Y-m-d"));
            $receber->setDt_vencimento($param['dtVencimento']);
            $receber->setGrupo_recebimento_id($param['grupo']['id']);
            $receber->setOcorrencia($param['ocorrencia']);
            $receber->setRemessa_gerada(0);
            $receber->setValor($param['valor']);
            $receber->setStatus_parcela_id(1);
            $receber->where('id','=',$param['id']);
            $receber->update();
            return [
                "msg"=>"Cadastro altualizado com sucesso",
                "code"=>201
            ];
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
	public function delete($param = null)
	{
        try{
            $receber = new \Data\Model\Recebimento();
            $receber->where('id','=',$param['id']);
            $receber->delete();
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
}