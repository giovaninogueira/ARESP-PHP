<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Pessoa_juridica;


trait Fornecedor
{
	public function ____construct()
	{

	}

	protected $pessoa_juridica; 
	// References - pessoa_juridica 

	private $pessoa_juridica_id; 
	// int(11) 


	public function setPessoa_juridica(Pessoa_juridica $pessoa_juridica)
	{
		$this->pessoa_juridica = $pessoa_juridica;
	}


	public function getPessoa_juridica()
	{
		return $this->pessoa_juridica;
	}


	public function setPessoa_juridica_id($pessoa_juridica_id)
	{
		$this->pessoa_juridica_id = $pessoa_juridica_id;
	}


	public function getPessoa_juridica_id()
	{
		return $this->pessoa_juridica_id;
	}


}