<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Categoria_pagamento;
use \Data\Model\Cheque;
use \Data\Model\Conta_caixa;
use \Data\Model\Fornecedor;
use \Data\Model\Status_parcela;


trait Pagamento
{
	public function ____construct()
	{

	}

	protected $categoria_pagamento; 
	// References - categoria_pagamento 

	protected $cheque; 
	// References - cheque 

	protected $conta_caixa; 
	// References - conta_caixa 

	protected $fornecedor; 
	// References - fornecedor 

	protected $status_parcela; 
	// References - status_parcela 

	protected $id; 
	// int(11) 

	protected $descricao; 
	// varchar(45) 

	protected $dt_emissao; 
	// datetime 

	protected $dt_competencia; 
	// datetime 

	protected $dt_vencimento; 
	// datetime 

	protected $dt_pagamento; 
	// datetime 

	protected $valor; 
	// decimal(10,2) 

	protected $parcela; 
	// int(11) 

	protected $num_nf; 
	// varchar(20) 

	protected $documento; 
	// varchar(20) 

	protected $valor_pago; 
	// decimal(10,2) 

	protected $cheque_emitido; 
	// tinyint(4) 

	protected $categoria_pagamento_id; 
	// int(11) 

	protected $conta_caixa_id; 
	// int(11) 

	protected $fornecedor_id; 
	// int(11) 

	protected $status_parcela_id; 
	// int(11) 

	protected $cheque_id; 
	// int(11) 


	public function setCategoria_pagamento(Categoria_pagamento $categoria_pagamento)
	{
		$this->categoria_pagamento = $categoria_pagamento;
	}


	public function getCategoria_pagamento()
	{
		return $this->categoria_pagamento;
	}


	public function setCheque(Cheque $cheque)
	{
		$this->cheque = $cheque;
	}


	public function getCheque()
	{
		return $this->cheque;
	}


	public function setConta_caixa(Conta_caixa $conta_caixa)
	{
		$this->conta_caixa = $conta_caixa;
	}


	public function getConta_caixa()
	{
		return $this->conta_caixa;
	}


	public function setFornecedor(Fornecedor $fornecedor)
	{
		$this->fornecedor = $fornecedor;
	}


	public function getFornecedor()
	{
		return $this->fornecedor;
	}


	public function setStatus_parcela(Status_parcela $status_parcela)
	{
		$this->status_parcela = $status_parcela;
	}


	public function getStatus_parcela()
	{
		return $this->status_parcela;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}


	public function getDescricao()
	{
		return $this->descricao;
	}


	public function setDt_emissao($dt_emissao)
	{
		$this->dt_emissao = $dt_emissao;
	}


	public function getDt_emissao()
	{
		return $this->dt_emissao;
	}


	public function setDt_competencia($dt_competencia)
	{
		$this->dt_competencia = $dt_competencia;
	}


	public function getDt_competencia()
	{
		return $this->dt_competencia;
	}


	public function setDt_vencimento($dt_vencimento)
	{
		$this->dt_vencimento = $dt_vencimento;
	}


	public function getDt_vencimento()
	{
		return $this->dt_vencimento;
	}


	public function setDt_pagamento($dt_pagamento)
	{
		$this->dt_pagamento = $dt_pagamento;
	}


	public function getDt_pagamento()
	{
		return $this->dt_pagamento;
	}


	public function setValor($valor)
	{
		$this->valor = $valor;
	}


	public function getValor()
	{
		return $this->valor;
	}


	public function setParcela($parcela)
	{
		$this->parcela = $parcela;
	}


	public function getParcela()
	{
		return $this->parcela;
	}


	public function setNum_nf($num_nf)
	{
		$this->num_nf = $num_nf;
	}


	public function getNum_nf()
	{
		return $this->num_nf;
	}


	public function setDocumento($documento)
	{
		$this->documento = $documento;
	}


	public function getDocumento()
	{
		return $this->documento;
	}


	public function setValor_pago($valor_pago)
	{
		$this->valor_pago = $valor_pago;
	}


	public function getValor_pago()
	{
		return $this->valor_pago;
	}


	public function setCheque_emitido($cheque_emitido)
	{
		$this->cheque_emitido = $cheque_emitido;
	}


	public function getCheque_emitido()
	{
		return $this->cheque_emitido;
	}


	public function setCategoria_pagamento_id($categoria_pagamento_id)
	{
		$this->categoria_pagamento_id = $categoria_pagamento_id;
	}


	public function getCategoria_pagamento_id()
	{
		return $this->categoria_pagamento_id;
	}


	public function setConta_caixa_id($conta_caixa_id)
	{
		$this->conta_caixa_id = $conta_caixa_id;
	}


	public function getConta_caixa_id()
	{
		return $this->conta_caixa_id;
	}


	public function setFornecedor_id($fornecedor_id)
	{
		$this->fornecedor_id = $fornecedor_id;
	}


	public function getFornecedor_id()
	{
		return $this->fornecedor_id;
	}


	public function setStatus_parcela_id($status_parcela_id)
	{
		$this->status_parcela_id = $status_parcela_id;
	}


	public function getStatus_parcela_id()
	{
		return $this->status_parcela_id;
	}


	public function setCheque_id($cheque_id)
	{
		$this->cheque_id = $cheque_id;
	}


	public function getCheque_id()
	{
		return $this->cheque_id;
	}


}