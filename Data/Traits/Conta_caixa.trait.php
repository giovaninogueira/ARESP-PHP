<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Conta_caixa
{
	public function ____construct()
	{

	}

	protected $empresa; 
	// References - empresa 

	protected $agencia; 
	// References - agencia 

	protected $id; 
	// int(11) 

	protected $numero; 
	// varchar(20) 

	protected $digito; 
	// int(11) 

	protected $nome; 
	// varchar(20) 

	protected $tipo; 
	// char(1) 

	protected $taxa_juros; 
	// decimal(10,2) 

	protected $taxa_multa; 
	// decimal(10,2) 

	protected $saldo_inicial; 
	// decimal(10,2) 

	protected $saldo_atual; 
	// decimal(10,2) 

	protected $empresa_id; 
	// int(11) 

	protected $agencia_id; 
	// int(11) 

	protected $conta_caixacol; 
	// varchar(45) 


	public function setEmpresa( $empresa)
	{
		$this->empresa = $empresa;
	}


	public function getEmpresa()
	{
		return $this->empresa;
	}


	public function setAgencia( $agencia)
	{
		$this->agencia = $agencia;
	}


	public function getAgencia()
	{
		return $this->agencia;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setDigito($digito)
	{
		$this->digito = $digito;
	}


	public function getDigito()
	{
		return $this->digito;
	}


	public function setNome($nome)
	{
		$this->nome = $nome;
	}


	public function getNome()
	{
		return $this->nome;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}


	public function getTipo()
	{
		return $this->tipo;
	}


	public function setTaxa_juros($taxa_juros)
	{
		$this->taxa_juros = $taxa_juros;
	}


	public function getTaxa_juros()
	{
		return $this->taxa_juros;
	}


	public function setTaxa_multa($taxa_multa)
	{
		$this->taxa_multa = $taxa_multa;
	}


	public function getTaxa_multa()
	{
		return $this->taxa_multa;
	}


	public function setSaldo_inicial($saldo_inicial)
	{
		$this->saldo_inicial = $saldo_inicial;
	}


	public function getSaldo_inicial()
	{
		return $this->saldo_inicial;
	}


	public function setSaldo_atual($saldo_atual)
	{
		$this->saldo_atual = $saldo_atual;
	}


	public function getSaldo_atual()
	{
		return $this->saldo_atual;
	}


	public function setEmpresa_id($empresa_id)
	{
		$this->empresa_id = $empresa_id;
	}


	public function getEmpresa_id()
	{
		return $this->empresa_id;
	}


	public function setAgencia_id($agencia_id)
	{
		$this->agencia_id = $agencia_id;
	}


	public function getAgencia_id()
	{
		return $this->agencia_id;
	}


	public function setConta_caixacol($conta_caixacol)
	{
		$this->conta_caixacol = $conta_caixacol;
	}


	public function getConta_caixacol()
	{
		return $this->conta_caixacol;
	}


}