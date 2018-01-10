<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Grupo
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $data_criacao; 
	// date 

	private $descricao; 
	// varchar(45) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_criacao($data_criacao)
	{
		$this->data_criacao = $data_criacao;
	}


	public function getData_criacao()
	{
		return $this->data_criacao;
	}


	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}


	public function getDescricao()
	{
		return $this->descricao;
	}


}