<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Instancia;


trait Endereco
{
	public function ____construct()
	{

	}

	protected $instancia; 
	// References - instancia 

	private $id; 
	// int(11) 

	private $logradouro; 
	// varchar(45) 

	private $numero; 
	// varchar(10) 

	private $complemento; 
	// varchar(20) 

	private $cidade; 
	// varchar(45) 

	private $cep; 
	// varchar(20) 

	private $estado; 
	// varchar(5) 

	private $bairro; 
	// varchar(45) 

	private $instancia_id; 
	// int(11) 


	public function setInstancia(Instancia $instancia)
	{
		$this->instancia = $instancia;
	}


	public function getInstancia()
	{
		return $this->instancia;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
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


	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}


	public function getCidade()
	{
		return $this->cidade;
	}


	public function setCep($cep)
	{
		$this->cep = $cep;
	}


	public function getCep()
	{
		return $this->cep;
	}


	public function setEstado($estado)
	{
		$this->estado = $estado;
	}


	public function getEstado()
	{
		return $this->estado;
	}


	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}


	public function getBairro()
	{
		return $this->bairro;
	}


	public function setInstancia_id($instancia_id)
	{
		$this->instancia_id = $instancia_id;
	}


	public function getInstancia_id()
	{
		return $this->instancia_id;
	}


}