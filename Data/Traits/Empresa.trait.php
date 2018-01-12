<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;
use \Data\Model\Convenio;
use \Data\Model\Pessoa_juridica;


trait Empresa
{
	public function ____construct()
	{

	}

	protected $convenio; 
	// References - convenio 

	protected $pessoa_juridica; 
	// References - pessoa_juridica 

	protected $pessoa_juridica_id; 
	// int(11) 

	protected $convenio_id; 
	// int(11) 


	public function setConvenio(Convenio $convenio)
	{
		$this->convenio = $convenio;
	}


	public function getConvenio()
	{
		return $this->convenio;
	}


	public function setPessoa_juridica(Pessoa_juridica $pessoa_juridica)
	{
		$this->pessoa_juridica = $pessoa_juridica;
	}


	public function getPessoa_juridica()
	{
		return $this->pessoa_juridica;
	}


	public function setPessoa_juridica_id($pessoa_juridica_id)
	{
		$this->pessoa_juridica_id = $pessoa_juridica_id;
	}


	public function getPessoa_juridica_id()
	{
		return $this->pessoa_juridica_id;
	}


	public function setConvenio_id($convenio_id)
	{
		$this->convenio_id = $convenio_id;
	}


	public function getConvenio_id()
	{
		return $this->convenio_id;
	}


}