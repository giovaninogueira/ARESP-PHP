<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cheque_recebido;
use \Data\Model\Parcela_receber;
use \Data\Model\Tipo_recebimento;


trait Parcela_recebimento
{
	public function ____construct()
	{

	}

	protected $cheque_recebido; 
	// References - cheque_recebido 

	protected $parcela_receber; 
	// References - parcela_receber 

	protected $tipo_recebimento; 
	// References - tipo_recebimento 

	protected $id; 
	// int(11) 

	protected $tx_juros; 
	// decimal(10,2) 

	protected $tx_desconto; 
	// decimal(10,2) 

	protected $tx_multa; 
	// decimal(10,2) 

	protected $valor_juros; 
	// decimal(10,2) 

	protected $valor_desconto; 
	// decimal(10,2) 

	protected $valor_multa; 
	// decimal(10,2) 

	protected $valor_recebido; 
	// decimal(10,2) 

	protected $data_recebimento; 
	// date 

	protected $historico; 
	// varchar(45) 

	protected $parcela_receber_id; 
	// int(11) 

	protected $cheque_recebido_id; 
	// int(11) 

	protected $tipo_recebimento_id; 
	// int(11) 


	public function setCheque_recebido(Cheque_recebido $cheque_recebido)
	{
		$this->cheque_recebido = $cheque_recebido;
	}


	public function getCheque_recebido()
	{
		return $this->cheque_recebido;
	}


	public function setParcela_receber(Parcela_receber $parcela_receber)
	{
		$this->parcela_receber = $parcela_receber;
	}


	public function getParcela_receber()
	{
		return $this->parcela_receber;
	}


	public function setTipo_recebimento(Tipo_recebimento $tipo_recebimento)
	{
		$this->tipo_recebimento = $tipo_recebimento;
	}


	public function getTipo_recebimento()
	{
		return $this->tipo_recebimento;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setTx_juros($tx_juros)
	{
		$this->tx_juros = $tx_juros;
	}


	public function getTx_juros()
	{
		return $this->tx_juros;
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


	public function setValor_juros($valor_juros)
	{
		$this->valor_juros = $valor_juros;
	}


	public function getValor_juros()
	{
		return $this->valor_juros;
	}


	public function setValor_desconto($valor_desconto)
	{
		$this->valor_desconto = $valor_desconto;
	}


	public function getValor_desconto()
	{
		return $this->valor_desconto;
	}


	public function setValor_multa($valor_multa)
	{
		$this->valor_multa = $valor_multa;
	}


	public function getValor_multa()
	{
		return $this->valor_multa;
	}


	public function setValor_recebido($valor_recebido)
	{
		$this->valor_recebido = $valor_recebido;
	}


	public function getValor_recebido()
	{
		return $this->valor_recebido;
	}


	public function setData_recebimento($data_recebimento)
	{
		$this->data_recebimento = $data_recebimento;
	}


	public function getData_recebimento()
	{
		return $this->data_recebimento;
	}


	public function setHistorico($historico)
	{
		$this->historico = $historico;
	}


	public function getHistorico()
	{
		return $this->historico;
	}


	public function setParcela_receber_id($parcela_receber_id)
	{
		$this->parcela_receber_id = $parcela_receber_id;
	}


	public function getParcela_receber_id()
	{
		return $this->parcela_receber_id;
	}


	public function setCheque_recebido_id($cheque_recebido_id)
	{
		$this->cheque_recebido_id = $cheque_recebido_id;
	}


	public function getCheque_recebido_id()
	{
		return $this->cheque_recebido_id;
	}


	public function setTipo_recebimento_id($tipo_recebimento_id)
	{
		$this->tipo_recebimento_id = $tipo_recebimento_id;
	}


	public function getTipo_recebimento_id()
	{
		return $this->tipo_recebimento_id;
	}


}