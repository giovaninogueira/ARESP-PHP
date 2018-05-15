<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Fornecedor
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $cnpj; 
	// varchar(45) 

	protected $razao; 
	// varchar(70) 

	protected $fantasia; 
	// varchar(45) 

	protected $email; 
	// varchar(70) 

	protected $telefone; 
	// varchar(20) 

	protected $contato; 
	// varchar(45) 

	protected $cadastro; 
	// datetime 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}


	public function getCnpj()
	{
		return $this->cnpj;
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


	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function getEmail()
	{
		return $this->email;
	}


	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}


	public function getTelefone()
	{
		return $this->telefone;
	}


	public function setContato($contato)
	{
		$this->contato = $contato;
	}


	public function getContato()
	{
		return $this->contato;
	}


	public function setCadastro($cadastro)
	{
		$this->cadastro = $cadastro;
	}


	public function getCadastro()
	{
		return $this->cadastro;
	}


}