<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Contas_receber;
use \Data\Model\Status_parcela;


trait Parcela_receber
{
	public function ____construct()
	{

	}

	protected $contas_receber; 
	// References - contas_receber 

	protected $status_parcela; 
	// References - status_parcela 

	private $id; 
	// int(11) 

	private $taxa_juros; 
	// decimal(10,2) 

	private $taxa_multa; 
	// decimal(10,2) 

	private $valor_juros; 
	// decimal(10,2) 

	private $nosso_numero; 
	// varchar(45) 

	private $valor_multa; 
	// decimal(10,2) 

	private $data_emissao; 
	// date 

	private $valor; 
	// decimal(10,2) 

	private $valor_desconto; 
	// decimal(10,2) 

	private $desconto; 
	// decimal(10,2) 

	private $data_vencimento; 
	// date 

	private $num_parcela; 
	// int(11) 

	private $tx_desconto; 
	// decimal(10,2) 

	private $status_parcela_id; 
	// int(11) 

	private $contas_receber_id; 
	// int(11) 


	public function setContas_receber(Contas_receber $contas_receber)
	{
		$this->contas_receber = $contas_receber;
	}


	public function getContas_receber()
	{
		return $this->contas_receber;
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


	public function setTaxa_juros($taxa_juros)
	{
		$this->taxa_juros = $taxa_juros;
	}


	public function getTaxa_juros()
	{
		return $this->taxa_juros;
	}


	public function setTaxa_multa($taxa_multa)
	{
		$this->taxa_multa = $taxa_multa;
	}


	public function getTaxa_multa()
	{
		return $this->taxa_multa;
	}


	public function setValor_juros($valor_juros)
	{
		$this->valor_juros = $valor_juros;
	}


	public function getValor_juros()
	{
		return $this->valor_juros;
	}


	public function setNosso_numero($nosso_numero)
	{
		$this->nosso_numero = $nosso_numero;
	}


	public function getNosso_numero()
	{
		return $this->nosso_numero;
	}


	public function setValor_multa($valor_multa)
	{
		$this->valor_multa = $valor_multa;
	}


	public function getValor_multa()
	{
		return $this->valor_multa;
	}


	public function setData_emissao($data_emissao)
	{
		$this->data_emissao = $data_emissao;
	}


	public function getData_emissao()
	{
		return $this->data_emissao;
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


	public function setDesconto($desconto)
	{
		$this->desconto = $desconto;
	}


	public function getDesconto()
	{
		return $this->desconto;
	}


	public function setData_vencimento($data_vencimento)
	{
		$this->data_vencimento = $data_vencimento;
	}


	public function getData_vencimento()
	{
		return $this->data_vencimento;
	}


	public function setNum_parcela($num_parcela)
	{
		$this->num_parcela = $num_parcela;
	}


	public function getNum_parcela()
	{
		return $this->num_parcela;
	}


	public function setTx_desconto($tx_desconto)
	{
		$this->tx_desconto = $tx_desconto;
	}


	public function getTx_desconto()
	{
		return $this->tx_desconto;
	}


	public function setStatus_parcela_id($status_parcela_id)
	{
		$this->status_parcela_id = $status_parcela_id;
	}


	public function getStatus_parcela_id()
	{
		return $this->status_parcela_id;
	}


	public function setContas_receber_id($contas_receber_id)
	{
		$this->contas_receber_id = $contas_receber_id;
	}


	public function getContas_receber_id()
	{
		return $this->contas_receber_id;
	}


}