<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;
use \Data\Model\Grupo;


trait Grupo_cliente
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	protected $grupo; 
	// References - grupo 

	protected $id; 
	// int(11) 

	protected $data_relacionamento; 
	// date 

	protected $cliente_id; 
	// int(11) 

	protected $grupo_id; 
	// int(11) 


	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}


	public function getCliente()
	{
		return $this->cliente;
	}


	public function setGrupo(Grupo $grupo)
	{
		$this->grupo = $grupo;
	}


	public function getGrupo()
	{
		return $this->grupo;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_relacionamento($data_relacionamento)
	{
		$this->data_relacionamento = $data_relacionamento;
	}


	public function getData_relacionamento()
	{
		return $this->data_relacionamento;
	}


	public function setCliente_id($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}


	public function getCliente_id()
	{
		return $this->cliente_id;
	}


	public function setGrupo_id($grupo_id)
	{
		$this->grupo_id = $grupo_id;
	}


	public function getGrupo_id()
	{
		return $this->grupo_id;
	}


}