<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Banco;
use \Data\Model\Cliente;


trait Cheque_recebido
{
	public function ____construct()
	{

	}

	protected $banco; 
	// References - banco 

	protected $cliente; 
	// References - cliente 

	private $id; 
	// int(11) 

	private $nome; 
	// varchar(45) 

	private $custodia; 
	// date 

	private $bom_para; 
	// date 

	private $data_emissao; 
	// date 

	private $valor_recebido; 
	// decimal(10,2) 

	private $valor; 
	// decimal(10,2) 

	private $conta; 
	// varchar(15) 

	private $agencia; 
	// varchar(15) 

	private $numero; 
	// varchar(15) 

	private $banco_id; 
	// int(11) 

	private $cliente_id; 
	// int(11) 


	public function setBanco(Banco $banco)
	{
		$this->banco = $banco;
	}


	public function getBanco()
	{
		return $this->banco;
	}


	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}


	public function getCliente()
	{
		return $this->cliente;
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


	public function setCustodia($custodia)
	{
		$this->custodia = $custodia;
	}


	public function getCustodia()
	{
		return $this->custodia;
	}


	public function setBom_para($bom_para)
	{
		$this->bom_para = $bom_para;
	}


	public function getBom_para()
	{
		return $this->bom_para;
	}


	public function setData_emissao($data_emissao)
	{
		$this->data_emissao = $data_emissao;
	}


	public function getData_emissao()
	{
		return $this->data_emissao;
	}


	public function setValor_recebido($valor_recebido)
	{
		$this->valor_recebido = $valor_recebido;
	}


	public function getValor_recebido()
	{
		return $this->valor_recebido;
	}


	public function setValor($valor)
	{
		$this->valor = $valor;
	}


	public function getValor()
	{
		return $this->valor;
	}


	public function setConta($conta)
	{
		$this->conta = $conta;
	}


	public function getConta()
	{
		return $this->conta;
	}


	public function setAgencia($agencia)
	{
		$this->agencia = $agencia;
	}


	public function getAgencia()
	{
		return $this->agencia;
	}


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function getNumero()
	{
		return $this->numero;
	}


	public function setBanco_id($banco_id)
	{
		$this->banco_id = $banco_id;
	}


	public function getBanco_id()
	{
		return $this->banco_id;
	}


	public function setCliente_id($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}


	public function getCliente_id()
	{
		return $this->cliente_id;
	}


}