<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;


trait Telefone
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	protected $id; 
	// int(11) 

	protected $numero; 
	// varchar(20) 

	protected $tipo; 
	// varchar(20) 

	protected $cliente_id; 
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


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}


	public function getTipo()
	{
		return $this->tipo;
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