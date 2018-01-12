<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Cliente;
use \Data\Model\Operadora;


trait Cartao_credito
{
	public function ____construct()
	{

	}

	protected $cliente; 
	// References - cliente 

	protected $operadora; 
	// References - operadora 

	protected $id; 
	// int(11) 

	protected $mes_vencimento; 
	// varchar(5) 

	protected $ano_vencimento; 
	// varchar(5) 

	protected $num_cartao; 
	// varchar(20) 

	protected $nome_titular; 
	// varchar(45) 

	protected $cliente_id; 
	// int(11) 

	protected $operadora_id; 
	// int(11) 


	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}


	public function getCliente()
	{
		return $this->cliente;
	}


	public function setOperadora(Operadora $operadora)
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


	public function setMes_vencimento($mes_vencimento)
	{
		$this->mes_vencimento = $mes_vencimento;
	}


	public function getMes_vencimento()
	{
		return $this->mes_vencimento;
	}


	public function setAno_vencimento($ano_vencimento)
	{
		$this->ano_vencimento = $ano_vencimento;
	}


	public function getAno_vencimento()
	{
		return $this->ano_vencimento;
	}


	public function setNum_cartao($num_cartao)
	{
		$this->num_cartao = $num_cartao;
	}


	public function getNum_cartao()
	{
		return $this->num_cartao;
	}


	public function setNome_titular($nome_titular)
	{
		$this->nome_titular = $nome_titular;
	}


	public function getNome_titular()
	{
		return $this->nome_titular;
	}


	public function setCliente_id($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}


	public function getCliente_id()
	{
		return $this->cliente_id;
	}


	public function setOperadora_id($operadora_id)
	{
		$this->operadora_id = $operadora_id;
	}


	public function getOperadora_id()
	{
		return $this->operadora_id;
	}


}