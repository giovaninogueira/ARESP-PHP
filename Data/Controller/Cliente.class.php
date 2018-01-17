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

            $date = intval(date('Y')) - $anoNascimento;

            if($date < 18)
                new ExceptionFramework('Ano de nascimento inválida',409);

            $cliente->setRg($request->rg);
            $cliente->setCpf($request->cpf);
            $cliente->setSexo($request->sexo);
            $cliente->setTipo_socio_id($request->tipo_socio);
            $cliente->setEstado_civil($request->estado_civil);

            $cliente->validationRgCpf();
            $cliente->salvarCliente();
            $cliente::$connection->commit();
            return "Cadastro de cliente efetuada com sucesso !";
        }catch (\Exception $e)
        {
            $cliente::$connection->rollBack();
            new ExceptionFramework($e->getMessage(),$e->getCode());
        }
    }

    public function getList()
    {
        $obj = new clienteModel();
        $result = $obj->select();
        $list = array();
        foreach ($result as $index => $value)
        {
            $pessoa_fisica = new \Data\Model\Pessoa_fisica();
            $pessoa_fisica->where('INSTANCIA_ID','=',$value['PESSOA_FISICA_ID']);
            $res = $pessoa_fisica->select();
            $list[] = [
                'nome'=> $res['NOME'],
                'id' => $value['PESSOA_FISICA_ID'],
                'cpf' => $value['CPF']
            ];
        }
        return $list;
    }

    public function getClienteById()
    {
        $request = Utils::$request;
        $id = $request->id;
        $cliente = new \Data\Model\Cliente();
        $cliente->showValuesJoing();
        $cliente->joinAdd('instancia','ID','=','cliente','PESSOA_FISICA_ID');
        $cliente->joinAdd('pessoa_fisica','INSTANCIA_ID','=','instancia','ID');
        $cliente->where('instancia.ID','=',$id);
        $result = $cliente->join();

        if(count($result) == 0)
            new ExceptionFramework('Nenhum usuário foi encontrado',412);
        return $result;
    }
}