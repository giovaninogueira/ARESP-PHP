<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cheque_emitido;
use \Data\Model\Parcela_pagar;
use \Data\Model\Tipo_pagamento;


trait Pagamento
{
	public function ____construct()
	{

	}

	protected $cheque_emitido; 
	// References - cheque_emitido 

	protected $parcela_pagar; 
	// References - parcela_pagar 

	protected $tipo_pagamento; 
	// References - tipo_pagamento 

	protected $id; 
	// int(11) 

	protected $historico; 
	// varchar(45) 

	protected $valor_pago; 
	// decimal(10,2) 

	protected $valor_multa; 
	// decimal(10,2) 

	protected $valor_juros; 
	// decimal(10,2) 

	protected $tx_juros; 
	// decimal(10,2) 

	protected $valor_desconto; 
	// decimal(10,2) 

	protected $tx_desconto; 
	// decimal(10,2) 

	protected $tx_multa; 
	// decimal(10,2) 

	protected $data_pagamento; 
	// date 

	protected $parcela_pagar_id; 
	// int(11) 

	protected $cheque_emitido_id; 
	// int(11) 

	protected $tipo_pagamento_id; 
	// int(11) 


	public function setCheque_emitido(Cheque_emitido $cheque_emitido)
	{
		$this->cheque_emitido = $cheque_emitido;
	}


	public function getCheque_emitido()
	{
		return $this->cheque_emitido;
	}


	public function setParcela_pagar(Parcela_pagar $parcela_pagar)
	{
		$this->parcela_pagar = $parcela_pagar;
	}


	public function getParcela_pagar()
	{
		return $this->parcela_pagar;
	}


	public function setTipo_pagamento(Tipo_pagamento $tipo_pagamento)
	{
		$this->tipo_pagamento = $tipo_pagamento;
	}


	public function getTipo_pagamento()
	{
		return $this->tipo_pagamento;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setHistorico($historico)
	{
		$this->historico = $historico;
	}


	public function getHistorico()
	{
		return $this->historico;
	}


	public function setValor_pago($valor_pago)
	{
		$this->valor_pago = $valor_pago;
	}


	public function getValor_pago()
	{
		return $this->valor_pago;
	}


	public function setValor_multa($valor_multa)
	{
		$this->valor_multa = $valor_multa;
	}


	public function getValor_multa()
	{
		return $this->valor_multa;
	}


	public function setValor_juros($valor_juros)
	{
		$this->valor_juros = $valor_juros;
	}


	public function getValor_juros()
	{
		return $this->valor_juros;
	}


	public function setTx_juros($tx_juros)
	{
		$this->tx_juros = $tx_juros;
	}


	public function getTx_juros()
	{
		return $this->tx_juros;
	}


	public function setValor_desconto($valor_desconto)
	{
		$this->valor_desconto = $valor_desconto;
	}


	public function getValor_desconto()
	{
		return $this->valor_desconto;
	}


	public function setTx_desconto($tx_desconto)
	{
		$this->tx_desconto = $tx_desconto;
	}


	public function getTx_desconto()
	{
		return $this->tx_desconto;
	}


	public function setTx_multa($tx_multa)
	{
		$this->tx_multa = $tx_multa;
	}


	public function getTx_multa()
	{
		return $this->tx_multa;
	}


	public function setData_pagamento($data_pagamento)
	{
		$this->data_pagamento = $data_pagamento;
	}


	public function getData_pagamento()
	{
		return $this->data_pagamento;
	}


	public function setParcela_pagar_id($parcela_pagar_id)
	{
		$this->parcela_pagar_id = $parcela_pagar_id;
	}


	public function getParcela_pagar_id()
	{
		return $this->parcela_pagar_id;
	}


	public function setCheque_emitido_id($cheque_emitido_id)
	{
		$this->cheque_emitido_id = $cheque_emitido_id;
	}


	public function getCheque_emitido_id()
	{
		return $this->cheque_emitido_id;
	}


	public function setTipo_pagamento_id($tipo_pagamento_id)
	{
		$this->tipo_pagamento_id = $tipo_pagamento_id;
	}


	public function getTipo_pagamento_id()
	{
		return $this->tipo_pagamento_id;
	}


}