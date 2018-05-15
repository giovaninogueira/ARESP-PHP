<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Cancelamento
{
	public function ____construct()
	{

	}

	protected $id; 
	// int(11) 

	protected $data_cancelamento; 
	// datetime 

	protected $data_pedido; 
	// datetime 

	protected $motivo; 
	// varchar(20) 

	protected $obs; 
	// varchar(255) 


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setData_cancelamento($data_cancelamento)
	{
		$this->data_cancelamento = $data_cancelamento;
	}


	public function getData_cancelamento()
	{
		return $this->data_cancelamento;
	}


	public function setData_pedido($data_pedido)
	{
		$this->data_pedido = $data_pedido;
	}


	public function getData_pedido()
	{
		return $this->data_pedido;
	}


	public function setMotivo($motivo)
	{
		$this->motivo = $motivo;
	}


	public function getMotivo()
	{
		return $this->motivo;
	}


	public function setObs($obs)
	{
		$this->obs = $obs;
	}


	public function getObs()
	{
		return $this->obs;
	}


}