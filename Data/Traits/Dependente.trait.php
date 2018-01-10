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

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 

	private $rg; 
	// varchar(15) 

	private $parentesco; 
	// varchar(20) 

	private $obs; 
	// varchar(255) 

	private $foto; 
	// varchar(255) 

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


	public function setObs($obs)
	{
		$this->obs = $obs;
	}


	public function getObs()
	{
		return $this->obs;
	}


	public function setFoto($foto)
	{
		$this->foto = $foto;
	}


	public function getFoto()
	{
		return $this->foto;
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