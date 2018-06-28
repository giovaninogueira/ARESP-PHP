<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;

class Pagamento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
            $valorDiv = $param['valor'] / $param['referecia'];
            $newDate = null;
            $num = strtotime(date('Y-m-d H:i:s'));
            for($i = 1; $i <=$param['referecia']; $i++){
                if(!$newDate){
                    $newDate = date('Y-m-d', strtotime("+1 month", strtotime($param["dtVencimento"])));
                }else{
                    $newDate = date('Y-m-d', strtotime("+1 month", strtotime($newDate)));
                }
                $pagamento = new \Data\Model\Pagamento();
                $pagamento->setCategoria_pagamento_id($param['categoria']['id']);
                $pagamento->setFornecedor_id($param['fornecedor']['id']);
                $pagamento->setConta_caixa_id($param['conta']['id']);
                $pagamento->setDescricao($param['descricao']);
                $pagamento->setDt_competencia(date('Y-m-d',strtotime($param["dtCompetencia"])));
                $pagamento->setDt_emissao(date ("Y-m-d"));
                $pagamento->setDt_vencimento($newDate);
                $pagamento->setParcela($i);
                $pagamento->setValor($valorDiv);
				$pagamento->setStatus_parcela_id(1);
				$pagamento->setNum_nf($param['numNf']);
				$pagamento->setCheque_emitido(0);
                $pagamento->save();
            }
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
	public function search($param = null)
	{
        $receber = new \Data\Model\Pagamento();
        $receber->viewSelect(
            [
                'id',
                'descricao',
                'dt_emissao as dtEmissao',
                'dt_competencia as dtcompetencia',
                'dt_vencimento as dtvencimento',
                'dt_pagamento as dtpagamento',
                'valor',
                'parcela as ocorrencia',
                'num_nf',
                'documento',
                'valor_pago',
                'cheque_emitido',
                'categoria_pagamento_id as categoria',
                'conta_caixa_id',
                'fornecedor_id as fornecedor',
                'status_parcela_id as status',
                'cheque_id'
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

                $categoria = new \Data\Model\Categoria_pagamento();
                $categoria->where('id','=',$list['categoria']);
                $list['categoria'] = $categoria->select();

                $status = new \Data\Model\Status_parcela();
                $status->where('id','=',$list['status']);
                $list['status'] = $status->select();
                
                $cliente = new \Data\Model\Fornecedor();
                $cliente->where('id','=',$list['fornecedor']);
                $list['fornecedor'] = $cliente->select();

                $conta = new \Data\Model\Conta_caixa();
                $conta->where('id','=',$list['conta']);
                $list['conta'] = $conta->select();

                return [
                    'result'=>$list
                ];
            }else{
                $list = $receber->selectAll();
                foreach ($list as $index=> $value){

                    $list[$index]['dtCompetencia'] = $value['dtcompetencia'];
                    $list[$index]['dtEmissao'] = $value['dtemissao'];
                    $list[$index]['dtVencimento'] = $value['dtvencimento'];

                    $categoria = new \Data\Model\Categoria_pagamento();
                    $categoria->where('id','=',$value['categoria']);
                    $list[$index]['categoria'] = $categoria->select();

                    $status = new \Data\Model\Status_parcela();
                    $status->where('id','=',$value['status']);
                    $value['status'] = $status->select();

                    $cliente = new \Data\Model\Fornecedor();
                    $cliente->where('id','=',$value['fornecedor']);
                    $list[$index]['fornecedor'] = $cliente->select();

                    $conta = new \Data\Model\Conta_caixa();
                    $conta->where('id','=',$value['conta']);
                    $list[$index]['conta'] = $conta->select();
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
            $pagamento = new \Data\Model\Pagamento();
            $pagamento->setCategoria_pagamento_id($param['categoria']['id']);
            $pagamento->setFornecedor_id($param['fornecedor']['id']);
            $pagamento->setConta_caixa_id($param['conta']['id']);
            $pagamento->setDescricao($param['descricao']);
            $pagamento->setDt_competencia(date('Y-m-d',strtotime($param["dtCompetencia"])));
            $pagamento->setDt_emissao(date ("Y-m-d"));
            $pagamento->setDt_vencimento(date('Y-m-d',strtotime($param["dtVencimento"])));
            $pagamento->setParcela($param['parcela']);
            $pagamento->setValor($param['valor']);
            $pagamento->setStatus_parcela_id(1);
            $pagamento->setNum_nf($param['numNf']);
            $pagamento->setCheque_emitido(0);
            $pagamento->save();
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
	public function delete($param = null)
	{
        try{
            $pagamento = new \Data\Mode\Pagamento();
            $pagamento->where('id','=',$param['id']);
            $pagamento->delete();
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(),402);
        }
	}
}