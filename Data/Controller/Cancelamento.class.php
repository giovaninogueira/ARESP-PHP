<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

class Cancelamento
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
			echo 'oi 2';
			die;
			$cancelamento = new \Data\Model\Cancelamento();
			$cancelamento->setData_cancelamento($param['dataCancelamento']);
			$cancelamento->setData_pedido($param['dataPedido']);
			$cancelamento->setMotivo($param['motivo']);
			$cancelamento->setObs($param['obs']);
			$cancelamento->save();
			$id = $cancelamento->lastID();
			
			return $id;
		}catch(\Exception $e){
			new ExceptionFramework($e->getMessage(), $e->getCode());
		}
	}
	public function search($param = null)
	{
		/*Mehtod GET HTTP*/
	}
	public function update($param = null)
	{
		/*Mehtod PUT HTTP*/
	}
	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

}