<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Convenio
{
	public function ____construct()
	{

	}

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 

	private $data_atualizacao; 
	// date 

	private $obs; 
	// varchar(255) 

	private $telefone; 
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


	public function setData_atualizacao($data_atualizacao)
	{
		$this->data_atualizacao = $data_atualizacao;
	}


	public function getData_atualizacao()
	{
		return $this->data_atualizacao;
	}


	public function setObs($obs)
	{
		$this->obs = $obs;
	}


	public function getObs()
	{
		return $this->obs;
	}


	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}


	public function getTelefone()
	{
		return $this->telefone;
	}


}