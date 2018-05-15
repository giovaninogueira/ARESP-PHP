<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Endereco
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $cep; 
	// varchar(20) 

	protected $logradouro; 
	// varchar(70) 

	protected $numero; 
	// varchar(10) 

	protected $complemento; 
	// varchar(45) 

	protected $bairro; 
	// varchar(70) 

	protected $cidade; 
	// varchar(70) 

	protected $estado; 
	// char(2) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setCep($cep)
	{
		$this->cep = $cep;
	}


	public function getCep()
	{
		return $this->cep;
	}


	public function setLogradouro($logradouro)
	{
		$this->logradouro = $logradouro;
	}


	public function getLogradouro()
	{
		return $this->logradouro;
	}


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}


	public function getComplemento()
	{
		return $this->complemento;
	}


	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}


	public function getBairro()
	{
		return $this->bairro;
	}


	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}


	public function getCidade()
	{
		return $this->cidade;
	}


	public function setEstado($estado)
	{
		$this->estado = $estado;
	}


	public function getEstado()
	{
		return $this->estado;
	}


}