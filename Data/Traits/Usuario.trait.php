<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Usuario
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $nome; 
	// varchar(50) 

	protected $email; 
	// varchar(70) 

	protected $senha; 
	// varchar(20) 


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


	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function getEmail()
	{
		return $this->email;
	}


	public function setSenha($senha)
	{
		$this->senha = $senha;
	}


	public function getSenha()
	{
		return $this->senha;
	}


}