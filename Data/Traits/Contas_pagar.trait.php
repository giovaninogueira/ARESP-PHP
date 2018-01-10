<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Fornecedor;


trait Contas_pagar
{
	public function ____construct()
	{

	}

	protected $fornecedor; 
	// References - fornecedor 

	private $id; 
	// int(11) 

	private $numero_documento; 
	// varchar(45) 

	private $primeiro_numero; 
	// varchar(45) 

	private $valor_total; 
	// decimal(10,2) 

	private $data_lancamento; 
	// date 

	private $valor_pagar; 
	// decimal(10,2) 

	private $qtde_parcela; 
	// int(11) 

	private $fornecedor_id; 
	// int(11) 

	private $usuario_id; 
	// int(11) 


	public function setFornecedor(Fornecedor $fornecedor)
	{
		$this->fornecedor = $fornecedor;
	}


	public function getFornecedor()
	{
		return $this->fornecedor;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setNumero_documento($numero_documento)
	{
		$this->numero_documento = $numero_documento;
	}


	public function getNumero_documento()
	{
		return $this->numero_documento;
	}


	public function setPrimeiro_numero($primeiro_numero)
	{
		$this->primeiro_numero = $primeiro_numero;
	}


	public function getPrimeiro_numero()
	{
		return $this->primeiro_numero;
	}


	public function setValor_total($valor_total)
	{
		$this->valor_total = $valor_total;
	}


	public function getValor_total()
	{
		return $this->valor_total;
	}


	public function setData_lancamento($data_lancamento)
	{
		$this->data_lancamento = $data_lancamento;
	}


	public function getData_lancamento()
	{
		return $this->data_lancamento;
	}


	public function setValor_pagar($valor_pagar)
	{
		$this->valor_pagar = $valor_pagar;
	}


	public function getValor_pagar()
	{
		return $this->valor_pagar;
	}


	public function setQtde_parcela($qtde_parcela)
	{
		$this->qtde_parcela = $qtde_parcela;
	}


	public function getQtde_parcela()
	{
		return $this->qtde_parcela;
	}


	public function setFornecedor_id($fornecedor_id)
	{
		$this->fornecedor_id = $fornecedor_id;
	}


	public function getFornecedor_id()
	{
		return $this->fornecedor_id;
	}


	public function setUsuario_id($usuario_id)
	{
		$this->usuario_id = $usuario_id;
	}


	public function getUsuario_id()
	{
		return $this->usuario_id;
	}


}