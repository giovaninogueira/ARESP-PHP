<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Usuario;


trait Tarefas
{
	public function ____construct()
	{

	}

	protected $usuario; 
	// References - usuario 

	protected $id; 
	// int(11) 

	protected $id_user; 
	// int(11) 

	protected $titulo; 
	// varchar(40) 

	protected $data_inicio; 
	// date 

	protected $status; 
	// enum('ToDo','Doing','Done') 

	protected $lembrar; 
	// tinyint(1) 

	protected $aviso; 
	// date 

	protected $data_modificacao; 
	// date 


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


	public function setId_user($id_user)
	{
		$this->id_user = $id_user;
	}


	public function getId_user()
	{
		return $this->id_user;
	}


	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}


	public function getTitulo()
	{
		return $this->titulo;
	}


	public function setData_inicio($data_inicio)
	{
		$this->data_inicio = $data_inicio;
	}


	public function getData_inicio()
	{
		return $this->data_inicio;
	}


	public function setStatus($status)
	{
		$this->status = $status;
	}


	public function getStatus()
	{
		return $this->status;
	}


	public function setLembrar($lembrar)
	{
		$this->lembrar = $lembrar;
	}


	public function getLembrar()
	{
		return $this->lembrar;
	}


	public function setAviso($aviso)
	{
		$this->aviso = $aviso;
	}


	public function getAviso()
	{
		return $this->aviso;
	}


	public function setData_modificacao($data_modificacao)
	{
		$this->data_modificacao = $data_modificacao;
	}


	public function getData_modificacao()
	{
		return $this->data_modificacao;
	}


}