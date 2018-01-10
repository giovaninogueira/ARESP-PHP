<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Operadora
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 

	private $icon; 
	// varchar(255) 


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


	public function setIcon($icon)
	{
		$this->icon = $icon;
	}


	public function getIcon()
	{
		return $this->icon;
	}


}