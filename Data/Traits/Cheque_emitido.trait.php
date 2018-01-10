<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Cheque_emitido
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $data_compensacao; 
	// date 

	private $nominal; 
	// varchar(45) 

	private $data_emissao; 
	// date 

	private $valor; 
	// decimal(10,2) 

	private $numero; 
	// varchar(10) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_compensacao($data_compensacao)
	{
		$this->data_compensacao = $data_compensacao;
	}


	public function getData_compensacao()
	{
		return $this->data_compensacao;
	}


	public function setNominal($nominal)
	{
		$this->nominal = $nominal;
	}


	public function getNominal()
	{
		return $this->nominal;
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


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


}