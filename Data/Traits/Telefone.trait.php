<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Instancia;


trait Telefone
{
	public function ____construct()
	{

	}

	protected $instancia; 
	// References - instancia 

	protected $id; 
	// int(11) 

	protected $numero; 
	// varchar(45) 

	protected $instancia_id; 
	// int(11) 


	public function setInstancia(Instancia $instancia)
	{
		$this->instancia = $instancia;
	}


	public function getInstancia()
	{
		return $this->instancia;
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


	public function setInstancia_id($instancia_id)
	{
		$this->instancia_id = $instancia_id;
	}


	public function getInstancia_id()
	{
		return $this->instancia_id;
	}


}