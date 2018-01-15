<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Convenio
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/
    public function save()
    {
        $request = Utils::$request;
        $obj = new \Data\Model\Convenio();
        try
        {
            $obj::$connection->beginTransaction();
            $obj->setNome($request->nome);
            $obj->setData_atualizacao(date("Y/m/d H:i:s"));
            $obj->setTelefone($request->telefone);

            $explodeTelefone = explode('_',$obj->getTelefone());

            if(count($explodeTelefone) > 1)
                new ExceptionFramework('Telefone inválido',409);

            $obj->setObs($request->obs);
            $obj->save();
            $obj::$connection->commit();
            return "Convenio salvo com sucesso";
        }
        catch (\Exception $e)
        {
            $obj::$connection->rollBack();
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
    }

    public function getList()
    {
        $obj = new \Data\Model\Convenio();
        return $obj->selectAll();
    }
}