<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Cheque
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $numero; 
	// varchar(20) 

	protected $nominal; 
	// varchar(70) 

	protected $valor; 
	// decimal(10,2) 

	protected $bom_para; 
	// datetime 

	protected $data_compensacao; 
	// datetime 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setNominal($nominal)
	{
		$this->nominal = $nominal;
	}


	public function getNominal()
	{
		return $this->nominal;
	}


	public function setValor($valor)
	{
		$this->valor = $valor;
	}


	public function getValor()
	{
		return $this->valor;
	}


	public function setBom_para($bom_para)
	{
		$this->bom_para = $bom_para;
	}


	public function getBom_para()
	{
		return $this->bom_para;
	}


	public function setData_compensacao($data_compensacao)
	{
		$this->data_compensacao = $data_compensacao;
	}


	public function getData_compensacao()
	{
		return $this->data_compensacao;
	}


}