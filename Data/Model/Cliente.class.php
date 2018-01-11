<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;
class Cliente extends Model
{
	use \Data\Traits\Cliente;

    public function salvarCliente()
    {
        $request = Utils::$request;
        $obj = new Pessoa_fisica();
        $obj->salvarPessoaFisica();
        $this->setPessoa_fisica_id($obj->lastid());
        $this->setRg($request->rg);
        $this->setCpf($request->cpf);
        $this->setNome_pai($request->nome_pai);
        $this->setNome_mae($request->nome_mae);
        $this->setData_nascimento($request->data_nascimento);
    }

    public function validationRgCpf()
    {
        $explodeRg = explode('_',$this->getRg());
        $explodeCpf = explode('_',$this->getCpf());

        if(count($explodeRg) > 1)
            new ExceptionFramework('Rg invlálido',409);
        if(count($explodeCpf) > 1)
            new ExceptionFramework('CPF invlálido',409);
        /**
         * Fazendo as validações para ver se tem rg e cpf iguais
         */

        $this->where('rg','=',$this->getRg());
        $resultRg = $this->select();

        if(count($resultRg) !=0)
            new ExceptionFramework('RG existente, tente outro',409);

        $this->where('cpf','=',$this->getCpf());
        $resultRg = $this->select();

        if(count($resultRg) !=0)
            new ExceptionFramework('CPF existente, tente outro',409);
    }
}