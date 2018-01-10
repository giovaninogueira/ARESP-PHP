<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;


trait Contas_receber
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	private $id; 
	// int(11) 

	private $valor_receber; 
	// decimal(10,2) 

	private $valor_total; 
	// decimal(10,2) 

	private $num_documento; 
	// varchar(45) 

	private $data_lancamento; 
	// date 

	private $cliente_id; 
	// int(11) 


	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}


	public function getCliente()
	{
		return $this->cliente;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setValor_receber($valor_receber)
	{
		$this->valor_receber = $valor_receber;
	}


	public function getValor_receber()
	{
		return $this->valor_receber;
	}


	public function setValor_total($valor_total)
	{
		$this->valor_total = $valor_total;
	}


	public function getValor_total()
	{
		return $this->valor_total;
	}


	public function setNum_documento($num_documento)
	{
		$this->num_documento = $num_documento;
	}


	public function getNum_documento()
	{
		return $this->num_documento;
	}


	public function setData_lancamento($data_lancamento)
	{
		$this->data_lancamento = $data_lancamento;
	}


	public function getData_lancamento()
	{
		return $this->data_lancamento;
	}


	public function setCliente_id($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}


	public function getCliente_id()
	{
		return $this->cliente_id;
	}


}