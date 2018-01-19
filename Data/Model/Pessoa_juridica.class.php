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

class Pessoa_juridica extends Model
{
	use \Data\Traits\Pessoa_juridica;

    public function salvarPessoaJuridica()
    {
        $request = Utils::$request;
        $obj = new Instancia();
        $obj->salvarInstancia();
        $this->setInstancia_id($obj->lastid());
        $this->setRazao_social($request->razao_social);
        $this->setCnpj($request->cnpj);
        $this->setInsc_municipal($request->insc_municipal);
        $this->setInsc_estadual($request->insc_estadual);
        $this->setNome_fantasia($request->nome_fantasia);
        $this->save();
        return $this->lastID();
      }

      public function updatePessoaJuridica()
      {
          $request = Utils::$request;
          $obj = new Instancia();
          $obj->updateInstancia();
          $this->setRazao_social($request->razao_social);
          $this->setCnpj($request->cnpj);
          $this->setInsc_municipal($request->insc_municipal);
          $this->setInsc_estadual($request->insc_estadual);
          $this->setNome_fantasia($request->nome_fantasia);
          $this->where('INSTANCIA_ID','=', $request->id);
          $this->update();
      }

      public function validationCnpj()
      {
          $request = Utils::$request;
        $explodeCnpj = explode('_',$this->getCnpj());

        if(count($explodeCnpj) > 1)
            new ExceptionFramework('Cnpj invlálido',409);
        /**
         * Fazendo as validações para ver se tem rg e cpf iguais
         */
        $this->where('cnpj','=',$this->getCnpj());
        $resultCnpj = $this->select();

        if(count($resultCnpj) !=0 && $resultCnpj['INSTANCIA_ID'] != $request->id)
            new ExceptionFramework('Cnpj existente, tente outro',409);
      }

 }