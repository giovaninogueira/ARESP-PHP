<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Agencia
{
	public function ____construct()
	{

	}

	protected $banco; 
	// References - banco 

	protected $id; 
	// int(11) 

	protected $numero; 
	// varchar(20) 

	protected $digito; 
	// char(1) 

	protected $telefone; 
	// varchar(45) 

	protected $gerente; 
	// varchar(45) 

	protected $banco_id; 
	// int(11) 


	public function setBanco( $banco)
	{
		$this->banco = $banco;
	}


	public function getBanco()
	{
		return $this->banco;
	}


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


	public function setDigito($digito)
	{
		$this->digito = $digito;
	}


	public function getDigito()
	{
		return $this->digito;
	}


	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}


	public function getTelefone()
	{
		return $this->telefone;
	}


	public function setGerente($gerente)
	{
		$this->gerente = $gerente;
	}


	public function getGerente()
	{
		return $this->gerente;
	}


	public function setBanco_id($banco_id)
	{
		$this->banco_id = $banco_id;
	}


	public function getBanco_id()
	{
		return $this->banco_id;
	}


}