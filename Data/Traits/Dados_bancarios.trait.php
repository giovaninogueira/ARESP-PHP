<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Dados_bancarios
{
	public function ____construct()
	{

	}

	protected $banco; 
	// References - banco 

	protected $operadora; 
	// References - operadora 

	protected $id; 
	// int(11) 

	protected $tipo; 
	// varchar(20) 

	protected $agencia; 
	// varchar(10) 

	protected $agencia_digito; 
	// char(1) 

	protected $conta; 
	// varchar(20) 

	protected $conta_digito; 
	// char(1) 

	protected $numero_cartao; 
	// varchar(45) 

	protected $mes; 
	// char(2) 

	protected $ano; 
	// char(2) 

	protected $operadora_id; 
	// int(11) 

	protected $banco_id; 
	// int(11) 


	public function setBanco( $banco)
	{
		$this->banco = $banco;
	}


	public function getBanco()
	{
		return $this->banco;
	}


	public function setOperadora( $operadora)
	{
		$this->operadora = $operadora;
	}


	public function getOperadora()
	{
		return $this->operadora;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}


	public function getTipo()
	{
		return $this->tipo;
	}


	public function setAgencia($agencia)
	{
		$this->agencia = $agencia;
	}


	public function getAgencia()
	{
		return $this->agencia;
	}


	public function setAgencia_digito($agencia_digito)
	{
		$this->agencia_digito = $agencia_digito;
	}


	public function getAgencia_digito()
	{
		return $this->agencia_digito;
	}


	public function setConta($conta)
	{
		$this->conta = $conta;
	}


	public function getConta()
	{
		return $this->conta;
	}


	public function setConta_digito($conta_digito)
	{
		$this->conta_digito = $conta_digito;
	}


	public function getConta_digito()
	{
		return $this->conta_digito;
	}


	public function setNumero_cartao($numero_cartao)
	{
		$this->numero_cartao = $numero_cartao;
	}


	public function getNumero_cartao()
	{
		return $this->numero_cartao;
	}


	public function setMes($mes)
	{
		$this->mes = $mes;
	}


	public function getMes()
	{
		return $this->mes;
	}


	public function setAno($ano)
	{
		$this->ano = $ano;
	}


	public function getAno()
	{
		return $this->ano;
	}


	public function setOperadora_id($operadora_id)
	{
		$this->operadora_id = $operadora_id;
	}


	public function getOperadora_id()
	{
		return $this->operadora_id;
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