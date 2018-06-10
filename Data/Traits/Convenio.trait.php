<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Convenio
{
	public function ____construct()
	{

	}

	protected $conta_caixa; 
	// References - conta_caixa 

	protected $id; 
	// int(11) 

	protected $nome; 
	// varchar(45) 

	protected $numero; 
	// int(11) 

	protected $telefone; 
	// varchar(20) 

	protected $observacao; 
	// varchar(255) 

	protected $conta_caixa_id; 
	// int(11) 


	public function setConta_caixa( $conta_caixa)
	{
		$this->conta_caixa = $conta_caixa;
	}


	public function getConta_caixa()
	{
		return $this->conta_caixa;
	}


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


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}


	public function getTelefone()
	{
		return $this->telefone;
	}


	public function setObservacao($observacao)
	{
		$this->observacao = $observacao;
	}


	public function getObservacao()
	{
		return $this->observacao;
	}


	public function setConta_caixa_id($conta_caixa_id)
	{
		$this->conta_caixa_id = $conta_caixa_id;
	}


	public function getConta_caixa_id()
	{
		return $this->conta_caixa_id;
	}


}