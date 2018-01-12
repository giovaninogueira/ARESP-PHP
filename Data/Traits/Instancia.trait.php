<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Instancia
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $data_cadastro; 
	// date 

	protected $data_atualizacao; 
	// date 

	protected $obs; 
	// varchar(255) 

	protected $email; 
	// varchar(70) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_cadastro($data_cadastro)
	{
		$this->data_cadastro = $data_cadastro;
	}


	public function getData_cadastro()
	{
		return $this->data_cadastro;
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


	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function getEmail()
	{
		return $this->email;
	}


}