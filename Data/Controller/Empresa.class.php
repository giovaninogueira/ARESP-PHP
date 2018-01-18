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

    public function getEmpresaById()
    {
        $request = Utils::$request;
        $id = $request->id;
        $cliente = new \Data\Model\Empresa();
        $cliente->showValuesJoing();
        $cliente->joinAdd('instancia','ID','=','Empresa','PESSOA_JURIDICA_ID');
        $cliente->joinAdd('pessoa_juridica','INSTANCIA_ID','=','instancia','ID');
        $cliente->where('instancia.ID','=',$id);
        $result = $cliente->join();

        if(count($result) == 0)
            new ExceptionFramework('Nenhuma empresa foi encontrado',412);

        return $result[0];
    }

    public function getList()
    {
        $obj = new \Data\Model\Empresa();
        $result = $obj->select();
        $list = array();
        foreach ($result as $index => $value)
        {
            $pessoa_juridica = new \Data\Model\Pessoa_juridica();
            $pessoa_juridica->where('INSTANCIA_ID','=', $value['PESSOA_JURIDICA_ID']);
            $res = $pessoa_juridica->select();
            $list[] = [
                'razao_social'=> $res['RAZAO_SOCIAL'],
                'id' => $value['PESSOA_JURIDICA_ID'],
                'cnpj' => $res['CNPJ']
            ];
        }
        return $list;
    }
}