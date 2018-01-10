<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Pessoa_fisica;


trait Usuario
{
	public function ____construct()
	{

	}

	protected $pessoa_fisica; 
	// References - pessoa_fisica 

	private $pessoa_fisica_id; 
	// int(11) 

	private $login; 
	// varchar(45) 

	private $senha; 
	// varchar(45) 


	public function setPessoa_fisica(Pessoa_fisica $pessoa_fisica)
	{
		$this->pessoa_fisica = $pessoa_fisica;
	}


	public function getPessoa_fisica()
	{
		return $this->pessoa_fisica;
	}


	public function setPessoa_fisica_id($pessoa_fisica_id)
	{
		$this->pessoa_fisica_id = $pessoa_fisica_id;
	}


	public function getPessoa_fisica_id()
	{
		return $this->pessoa_fisica_id;
	}


	public function setLogin($login)
	{
		$this->login = $login;
	}


	public function getLogin()
	{
		return $this->login;
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