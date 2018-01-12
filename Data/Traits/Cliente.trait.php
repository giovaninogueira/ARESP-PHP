<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Pessoa_fisica;
use \Data\Model\Tipo_socio;


trait Cliente
{
	public function ____construct()
	{

	}

	protected $pessoa_fisica; 
	// References - pessoa_fisica 

	protected $tipo_socio; 
	// References - tipo_socio 

	protected $pessoa_fisica_id; 
	// int(11) 

	protected $rg; 
	// varchar(15) 

	protected $cpf; 
	// varchar(45) 

	protected $nome_pai; 
	// varchar(45) 

	protected $nome_mae; 
	// varchar(45) 

	protected $data_nascimento; 
	// varchar(45) 

	protected $sexo; 
	// char(1) 

	protected $estado_civil; 
	// varchar(20) 

	protected $foto; 
	// varchar(255) 

	protected $tipo_socio_id; 
	// int(11) 


	public function setPessoa_fisica(Pessoa_fisica $pessoa_fisica)
	{
		$this->pessoa_fisica = $pessoa_fisica;
	}


	public function getPessoa_fisica()
	{
		return $this->pessoa_fisica;
	}


	public function setTipo_socio(Tipo_socio $tipo_socio)
	{
		$this->tipo_socio = $tipo_socio;
	}


	public function getTipo_socio()
	{
		return $this->tipo_socio;
	}


	public function setPessoa_fisica_id($pessoa_fisica_id)
	{
		$this->pessoa_fisica_id = $pessoa_fisica_id;
	}


	public function getPessoa_fisica_id()
	{
		return $this->pessoa_fisica_id;
	}


	public function setRg($rg)
	{
		$this->rg = $rg;
	}


	public function getRg()
	{
		return $this->rg;
	}


	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}


	public function getCpf()
	{
		return $this->cpf;
	}


	public function setNome_pai($nome_pai)
	{
		$this->nome_pai = $nome_pai;
	}


	public function getNome_pai()
	{
		return $this->nome_pai;
	}


	public function setNome_mae($nome_mae)
	{
		$this->nome_mae = $nome_mae;
	}


	public function getNome_mae()
	{
		return $this->nome_mae;
	}


	public function setData_nascimento($data_nascimento)
	{
		$this->data_nascimento = $data_nascimento;
	}


	public function getData_nascimento()
	{
		return $this->data_nascimento;
	}


	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}


	public function getSexo()
	{
		return $this->sexo;
	}


	public function setEstado_civil($estado_civil)
	{
		$this->estado_civil = $estado_civil;
	}


	public function getEstado_civil()
	{
		return $this->estado_civil;
	}


	public function setFoto($foto)
	{
		$this->foto = $foto;
	}


	public function getFoto()
	{
		return $this->foto;
	}


	public function setTipo_socio_id($tipo_socio_id)
	{
		$this->tipo_socio_id = $tipo_socio_id;
	}


	public function getTipo_socio_id()
	{
		return $this->tipo_socio_id;
	}


}