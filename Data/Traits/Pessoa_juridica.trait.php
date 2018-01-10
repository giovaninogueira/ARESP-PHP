<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Instancia;


trait Pessoa_juridica
{
	public function ____construct()
	{

	}

	protected $instancia; 
	// References - instancia 

	private $instancia_id; 
	// int(11) 

	private $razao_social; 
	// varchar(45) 

	private $nome_fantasia; 
	// varchar(45) 

	private $cnpj; 
	// varchar(45) 

	private $insc_municipal; 
	// varchar(45) 

	private $insc_estadual; 
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


	public function setRazao_social($razao_social)
	{
		$this->razao_social = $razao_social;
	}


	public function getRazao_social()
	{
		return $this->razao_social;
	}


	public function setNome_fantasia($nome_fantasia)
	{
		$this->nome_fantasia = $nome_fantasia;
	}


	public function getNome_fantasia()
	{
		return $this->nome_fantasia;
	}


	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}


	public function getCnpj()
	{
		return $this->cnpj;
	}


	public function setInsc_municipal($insc_municipal)
	{
		$this->insc_municipal = $insc_municipal;
	}


	public function getInsc_municipal()
	{
		return $this->insc_municipal;
	}


	public function setInsc_estadual($insc_estadual)
	{
		$this->insc_estadual = $insc_estadual;
	}


	public function getInsc_estadual()
	{
		return $this->insc_estadual;
	}


}