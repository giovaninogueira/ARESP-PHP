<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;


trait Secretaria
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 

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


	public function setNome($nome)
	{
		$this->nome = $nome;
	}


	public function getNome()
	{
		return $this->nome;
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