<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Instancia;


trait Pessoa_fisica
{
	public function ____construct()
	{

	}

	protected $instancia; 
	// References - instancia 

	private $instancia_id; 
	// int(11) 

	private $nome; 
	// varchar(45) 


	public function setInstancia(Instancia $instancia)
	{
		$this->instancia = $instancia;
	}


	public function getInstancia()
	{
		return $this->instancia;
	}


	public function setInstancia_id($instancia_id)
	{
		$this->instancia_id = $instancia_id;
	}


	public function getInstancia_id()
	{
		return $this->instancia_id;
	}


	public function setNome($nome)
	{
		$this->nome = $nome;
	}


	public function getNome()
	{
		return $this->nome;
	}


}