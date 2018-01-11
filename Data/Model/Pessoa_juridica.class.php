<?php

/**
* Skyfall Micro-Framework
* Generate ORM Model
* Version 1.0.0
*/

namespace Data\Model; 

use SkyfallFramework\Common\CRUD\Model;

class Pessoa_juridica extends Model
{
	use \Data\Traits\Pessoa_juridica;



public function salvarPessoaJuridica(){
              $request = Utils::$request;

        $obj = new \Data\Model\Instancia();
        $obj->salvarInstancia();
        $this->setId($obj->lastid());
        $this->setRazao_social($request->razao_social);
        $this->setCnpj($request->cnpj);
        $this->setinscricao_municipal($request->inscricao_municipal);
         $this->setinscricao_estadual($request->inscricao_estadual);
         $this->setNome_social($request->nome_fantasia);

        return $this->lastID();
      }

      public function validationCnpj()
    {
        $explodeCnpj = explode('/',$this->getCnpj());
        

        if(count($explodeCnpj) > 1)
            new ExceptionFramework('Cnpj invlálido',409);
        
        /**
         * Fazendo as validações para ver se tem rg e cpf iguais
         */

        $this->where('cnpj','=',$this->getCnpj());
        $resultCnpj = $this->select();

        if(count($resultCnpj) !=0)
            new ExceptionFramework('Cnpj existente, tente outro',409);

        
    }

 }