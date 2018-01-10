<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Status_parcela
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $descricao; 
	// varchar(45) 

	private $situacao; 
	// varchar(45) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}


	public function getDescricao()
	{
		return $this->descricao;
	}


	public function setSituacao($situacao)
	{
		$this->situacao = $situacao;
	}


	public function getSituacao()
	{
		return $this->situacao;
	}


}