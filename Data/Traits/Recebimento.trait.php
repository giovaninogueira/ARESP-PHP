<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Categoria_recebimento;
use \Data\Model\Cliente;
use \Data\Model\Conta_caixa;
use \Data\Model\Grupo_recebimento;
use \Data\Model\Status_parcela;


trait Recebimento
{
	public function ____construct()
	{

	}

	protected $categoria_recebimento; 
	// References - categoria_recebimento 

	protected $cliente; 
	// References - cliente 

	protected $conta_caixa; 
	// References - conta_caixa 

	protected $grupo_recebimento; 
	// References - grupo_recebimento 

	protected $status_parcela; 
	// References - status_parcela 

	protected $id; 
	// int(11) 

	protected $descricao; 
	// varchar(70) 

	protected $dt_emissao; 
	// datetime 

	protected $dt_compentencia; 
	// datetime 

	protected $dt_vencimento; 
	// datetime 

	protected $dt_recebimento; 
	// datetime 

	protected $valor; 
	// decimal(10,2) 

	protected $ocorrencia; 
	// int(11) 

	protected $num_documento; 
	// varchar(20) 

	protected $nosso_numero; 
	// varchar(30) 

	protected $remessa_gerada; 
	// tinyint(4) 

	protected $valor_recebido; 
	// decimal(10,2) 

	protected $cliente_id; 
	// int(11) 

	protected $grupo_recebimento_id; 
	// int(11) 

	protected $categoria_recebimento_id; 
	// int(11) 

	protected $conta_caixa_id; 
	// int(11) 

	protected $status_parcela_id; 
	// int(11) 


	public function setCategoria_recebimento(Categoria_recebimento $categoria_recebimento)
	{
		$this->categoria_recebimento = $categoria_recebimento;
	}


	public function getCategoria_recebimento()
	{
		return $this->categoria_recebimento;
	}


	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}


	public function getCliente()
	{
		return $this->cliente;
	}


	public function setConta_caixa(Conta_caixa $conta_caixa)
	{
		$this->conta_caixa = $conta_caixa;
	}


	public function getConta_caixa()
	{
		return $this->conta_caixa;
	}


	public function setGrupo_recebimento(Grupo_recebimento $grupo_recebimento)
	{
		$this->grupo_recebimento = $grupo_recebimento;
	}


	public function getGrupo_recebimento()
	{
		return $this->grupo_recebimento;
	}


	public function setStatus_parcela(Status_parcela $status_parcela)
	{
		$this->status_parcela = $status_parcela;
	}


	public function getStatus_parcela()
	{
		return $this->status_parcela;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}


	public function getDescricao()
	{
		return $this->descricao;
	}


	public function setDt_emissao($dt_emissao)
	{
		$this->dt_emissao = $dt_emissao;
	}


	public function getDt_emissao()
	{
		return $this->dt_emissao;
	}


	public function setDt_compentencia($dt_compentencia)
	{
		$this->dt_compentencia = $dt_compentencia;
	}


	public function getDt_compentencia()
	{
		return $this->dt_compentencia;
	}


	public function setDt_vencimento($dt_vencimento)
	{
		$this->dt_vencimento = $dt_vencimento;
	}


	public function getDt_vencimento()
	{
		return $this->dt_vencimento;
	}


	public function setDt_recebimento($dt_recebimento)
	{
		$this->dt_recebimento = $dt_recebimento;
	}


	public function getDt_recebimento()
	{
		return $this->dt_recebimento;
	}


	public function setValor($valor)
	{
		$this->valor = $valor;
	}


	public function getValor()
	{
		return $this->valor;
	}


	public function setOcorrencia($ocorrencia)
	{
		$this->ocorrencia = $ocorrencia;
	}


	public function getOcorrencia()
	{
		return $this->ocorrencia;
	}


	public function setNum_documento($num_documento)
	{
		$this->num_documento = $num_documento;
	}


	public function getNum_documento()
	{
		return $this->num_documento;
	}


	public function setNosso_numero($nosso_numero)
	{
		$this->nosso_numero = $nosso_numero;
	}


	public function getNosso_numero()
	{
		return $this->nosso_numero;
	}


	public function setRemessa_gerada($remessa_gerada)
	{
		$this->remessa_gerada = $remessa_gerada;
	}


	public function getRemessa_gerada()
	{
		return $this->remessa_gerada;
	}


	public function setValor_recebido($valor_recebido)
	{
		$this->valor_recebido = $valor_recebido;
	}


	public function getValor_recebido()
	{
		return $this->valor_recebido;
	}


	public function setCliente_id($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}


	public function getCliente_id()
	{
		return $this->cliente_id;
	}


	public function setGrupo_recebimento_id($grupo_recebimento_id)
	{
		$this->grupo_recebimento_id = $grupo_recebimento_id;
	}


	public function getGrupo_recebimento_id()
	{
		return $this->grupo_recebimento_id;
	}


	public function setCategoria_recebimento_id($categoria_recebimento_id)
	{
		$this->categoria_recebimento_id = $categoria_recebimento_id;
	}


	public function getCategoria_recebimento_id()
	{
		return $this->categoria_recebimento_id;
	}


	public function setConta_caixa_id($conta_caixa_id)
	{
		$this->conta_caixa_id = $conta_caixa_id;
	}


	public function getConta_caixa_id()
	{
		return $this->conta_caixa_id;
	}


	public function setStatus_parcela_id($status_parcela_id)
	{
		$this->status_parcela_id = $status_parcela_id;
	}


	public function getStatus_parcela_id()
	{
		return $this->status_parcela_id;
	}


}