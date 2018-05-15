<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;


trait Dependente
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	protected $id; 
	// int(11) 

	protected $nome; 
	// varchar(70) 

	protected $rg; 
	// varchar(20) 

	protected $parentesco; 
	// varchar(20) 

	protected $nascimento; 
	// datetime 

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


	public function setNome($nome)
	{
		$this->nome = $nome;
	}


	public function getNome()
	{
		return $this->nome;
	}


	public function setRg($rg)
	{
		$this->rg = $rg;
	}


	public function getRg()
	{
		return $this->rg;
	}


	public function setParentesco($parentesco)
	{
		$this->parentesco = $parentesco;
	}


	public function getParentesco()
	{
		return $this->parentesco;
	}


	public function setNascimento($nascimento)
	{
		$this->nascimento = $nascimento;
	}


	public function getNascimento()
	{
		return $this->nascimento;
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