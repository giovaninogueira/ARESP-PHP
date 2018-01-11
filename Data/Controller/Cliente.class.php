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

class Cliente
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/

    public function Save()
    {
        $request = Utils::$request;

        $data = DateTime::createFromFormat("Y-m-d", $request->data_nascimento);

        $anoNascimento = intval($data->format('Y'));

        if($anoNascimento >= intval(date('Y')))
            new ExceptionFramework('Ano de nascimento inválida',409);

        $instanciaObj = new \Data\Model\Instancia();
        $cliente = new \Data\Model\Cliente();
        $instanciaObj->setEmail($request->email);
        $instanciaObj->validationEmail();
        $cliente->setRg($request->rg);
        $cliente->setCpf($request->cpf);
        $cliente->validationRgCpf();

        $cliente->salvarCliente();
        return 'foi';
    }
}