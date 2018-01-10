<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Usuario;


trait Log
{
	public function ____construct()
	{

	}

	protected $usuario; 
	// References - usuario 

	private $id; 
	// int(11) 

	private $data_acao; 
	// date 

	private $descricao; 
	// varchar(45) 

	private $usuario_id; 
	// int(11) 


	public function setUsuario(Usuario $usuario)
	{
		$this->usuario = $usuario;
	}


	public function getUsuario()
	{
		return $this->usuario;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_acao($data_acao)
	{
		$this->data_acao = $data_acao;
	}


	public function getData_acao()
	{
		return $this->data_acao;
	}


	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}


	public function getDescricao()
	{
		return $this->descricao;
	}


	public function setUsuario_id($usuario_id)
	{
		$this->usuario_id = $usuario_id;
	}


	public function getUsuario_id()
	{
		return $this->usuario_id;
	}


}