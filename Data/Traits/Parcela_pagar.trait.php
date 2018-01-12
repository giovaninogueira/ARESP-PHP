<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Contas_pagar;
use \Data\Model\Status_parcela;


trait Parcela_pagar
{
	public function ____construct()
	{

	}

	protected $contas_pagar; 
	// References - contas_pagar 

	protected $status_parcela; 
	// References - status_parcela 

	protected $id; 
	// int(11) 

	protected $data_emissao; 
	// date 

	protected $data_vencimento; 
	// date 

	protected $valor; 
	// decimal(10,2) 

	protected $valor_desconto; 
	// decimal(10,2) 

	protected $tx_desconto; 
	// decimal(10,2) 

	protected $desconto_ate; 
	// date 

	protected $valor_multa; 
	// decimal(10,2) 

	protected $valor_juros; 
	// decimal(10,2) 

	protected $tx_multa; 
	// decimal(10,2) 

	protected $tx_juros; 
	// decimal(10,2) 

	protected $contas_pagar_id; 
	// int(11) 

	protected $status_parcela_id; 
	// int(11) 


	public function setContas_pagar(Contas_pagar $contas_pagar)
	{
		$this->contas_pagar = $contas_pagar;
	}


	public function getContas_pagar()
	{
		return $this->contas_pagar;
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


	public function setData_emissao($data_emissao)
	{
		$this->data_emissao = $data_emissao;
	}


	public function getData_emissao()
	{
		return $this->data_emissao;
	}


	public function setData_vencimento($data_vencimento)
	{
		$this->data_vencimento = $data_vencimento;
	}


	public function getData_vencimento()
	{
		return $this->data_vencimento;
	}


	public function setValor($valor)
	{
		$this->valor = $valor;
	}


	public function getValor()
	{
		return $this->valor;
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


	public function setDesconto_ate($desconto_ate)
	{
		$this->desconto_ate = $desconto_ate;
	}


	public function getDesconto_ate()
	{
		return $this->desconto_ate;
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


	public function setTx_multa($tx_multa)
	{
		$this->tx_multa = $tx_multa;
	}


	public function getTx_multa()
	{
		return $this->tx_multa;
	}


	public function setTx_juros($tx_juros)
	{
		$this->tx_juros = $tx_juros;
	}


	public function getTx_juros()
	{
		return $this->tx_juros;
	}


	public function setContas_pagar_id($contas_pagar_id)
	{
		$this->contas_pagar_id = $contas_pagar_id;
	}


	public function getContas_pagar_id()
	{
		return $this->contas_pagar_id;
	}


	public function setStatus_parcela_id($status_parcela_id)
	{
		$this->status_parcela_id = $status_parcela_id;
	}


	public function getStatus_parcela_id()
	{
		return $this->status_parcela_id;
	}


}