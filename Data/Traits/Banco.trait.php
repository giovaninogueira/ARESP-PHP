<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Banco
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 


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


}