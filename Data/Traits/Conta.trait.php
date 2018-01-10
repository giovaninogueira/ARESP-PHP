<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Banco;
use \Data\Model\Instancia;


trait Conta
{
	public function ____construct()
	{

	}

	protected $banco; 
	// References - banco 

	protected $instancia; 
	// References - instancia 

	private $id; 
	// int(11) 

	private $agencia; 
	// varchar(15) 

	private $dig_conta; 
	// varchar(2) 

	private $dig_agencia; 
	// varchar(2) 

	private $nome_titular; 
	// varchar(70) 

	private $data_atualizacao; 
	// date 

	private $instancia_id; 
	// int(11) 

	private $banco_id; 
	// int(11) 


	public function setBanco(Banco $banco)
	{
		$this->banco = $banco;
	}


	public function getBanco()
	{
		return $this->banco;
	}


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


	public function setAgencia($agencia)
	{
		$this->agencia = $agencia;
	}


	public function getAgencia()
	{
		return $this->agencia;
	}


	public function setDig_conta($dig_conta)
	{
		$this->dig_conta = $dig_conta;
	}


	public function getDig_conta()
	{
		return $this->dig_conta;
	}


	public function setDig_agencia($dig_agencia)
	{
		$this->dig_agencia = $dig_agencia;
	}


	public function getDig_agencia()
	{
		return $this->dig_agencia;
	}


	public function setNome_titular($nome_titular)
	{
		$this->nome_titular = $nome_titular;
	}


	public function getNome_titular()
	{
		return $this->nome_titular;
	}


	public function setData_atualizacao($data_atualizacao)
	{
		$this->data_atualizacao = $data_atualizacao;
	}


	public function getData_atualizacao()
	{
		return $this->data_atualizacao;
	}


	public function setInstancia_id($instancia_id)
	{
		$this->instancia_id = $instancia_id;
	}


	public function getInstancia_id()
	{
		return $this->instancia_id;
	}


	public function setBanco_id($banco_id)
	{
		$this->banco_id = $banco_id;
	}


	public function getBanco_id()
	{
		return $this->banco_id;
	}


}