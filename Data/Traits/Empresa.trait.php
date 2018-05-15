<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Empresa
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $razao; 
	// varchar(70) 

	protected $fantasia; 
	// varchar(20) 

	protected $cnpj; 
	// varchar(25) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setRazao($razao)
	{
		$this->razao = $razao;
	}


	public function getRazao()
	{
		return $this->razao;
	}


	public function setFantasia($fantasia)
	{
		$this->fantasia = $fantasia;
	}


	public function getFantasia()
	{
		return $this->fantasia;
	}


	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}


	public function getCnpj()
	{
		return $this->cnpj;
	}


}