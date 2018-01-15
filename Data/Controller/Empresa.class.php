<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Empresa
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/
    public function save()
    {
        $request = Utils::$request;
        $empresa = new \Data\Model\Empresa();
        try
        {
            $empresa::$connection->beginTransaction();
            $pessoa_juridica = new \Data\Model\Pessoa_juridica();
            $empresa->setPessoa_juridica($pessoa_juridica);
            $pessoa_juridica->setCnpj($request->cnpj);
            $pessoa_juridica->validationCnpj();
            $empresa->saveEmpresa();
            $empresa::$connection->commit();
            return "Cadastro da empresa efetuado com sucesso";
        }
        catch (\Exception $e)
        {
            $empresa::$connection->rollBack();
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
    }
}