<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use DateTime;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;
use Data\Model\Cliente as clienteModel;
use Data\Model\Instancia;

class Cliente
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/

    public function Save()
    {
        $cliente = new clienteModel();
        try
        {
            $cliente::$connection->beginTransaction();
            $pessoa_fisica = new \Data\Model\Pessoa_fisica();

            $cliente->setPessoa_fisica($pessoa_fisica);

            $request = Utils::$request;
            $data = DateTime::createFromFormat("Y-m-d", $request->data_nascimento);
            $anoNascimento = intval($data->format('Y'));

            if($anoNascimento >= intval(date('Y')))
                new ExceptionFramework('Ano de nascimento inválida',409);

            $instanciaObj = new Instancia();
            $instanciaObj->setEmail($request->email);
            $instanciaObj->validationEmail();

            $cliente->setRg($request->rg);
            $cliente->setCpf($request->cpf);
            $cliente->setSexo($request->sexo);
            $cliente->setTipo_socio_id($request->tipo_socio);
            $cliente->setEstado_civil($request->estado_civil);

            $cliente->validationRgCpf();
            $cliente->salvarCliente();
            $cliente::$connection->commit();
            return true;
        }catch (\Exception $e)
        {
            $cliente::$connection->rollBack();
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
    }
}