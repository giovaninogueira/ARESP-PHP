<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Exception\ExceptionFramework;

class Dados_bancarios
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
            $dadosBancarios = new \Data\Model\Dados_bancarios();
            
            if(!$param["tipo"])
                new ExceptionFramework('Escolha um tipo de dados bancarios',422);

            $dadosBancarios->setTipo($param["tipo"]);
            switch ($param["tipo"]){
                case 'BOLETO':
                    //não faz nada
                    break;
                case 'DEBITO':
                    $dadosBancarios->setAgencia($param["agencia"]);
                    if(strlen($param["agenciaDigito"]) >1 || $param["agenciaDigito"]<1)
                        new ExceptionFramework('O digito de agencia é obrigatório e aceita apenas um caracter',422);
                    if(strlen($param["contaDigito"]) >1 || $param["contaDigito"]<1)
                        new ExceptionFramework('O digito da conta é obrigatório e aceita apenas um caracter',422);
                    if(!$param["banco"])
                        new ExceptionFramework('Escolha um banco',422);
                    $dadosBancarios->setAgencia_digito($param["agenciaDigito"]);
                    $dadosBancarios->setConta($param["conta"]);
                    $dadosBancarios->setConta_digito($param["contaDigito"]);
                    $dadosBancarios->setBanco_id($param["banco"]["id"]);
                    break;

                case 'FATURA':

                    if(!$param["operadora"])
                        new ExceptionFramework('Escolha uma operadora',422);

                    $dadosBancarios->setAno($param["ano"]);
                    $dadosBancarios->setMes($param["mes"]);
                    $dadosBancarios->setOperadora_id($param["operadora"]["id"]);
                    $dadosBancarios->setNumero_cartao($param["numeroCartao"]);
                    break;

                case 'HOLERITE':
                    $dadosBancarios->setAgencia($param["agencia"]);

                    if(strlen($param["agenciaDigito"]) >1 || $param["agenciaDigito"]<1)
                        new ExceptionFramework('O digito de agencia é obrigatório e aceita apenas um caracter',422);

                    if(strlen($param["contaDigito"]) >1 || $param["contaDigito"]<1)
                        new ExceptionFramework('O digito da conta é obrigatório e aceita apenas um caracter',422);

                    if(!$param["banco"])
                        new ExceptionFramework('Escolha um banco',422);

                    if(!$param["operadora"])
                        new ExceptionFramework('Escolha uma operadora',422);

                    $dadosBancarios->setAno($param["ano"]);
                    $dadosBancarios->setMes($param["mes"]);
                    $dadosBancarios->setOperadora_id($param["operadora"]["id"]);
                    $dadosBancarios->setNumero_cartao($param["numeroCartao"]);
                    $dadosBancarios->setAgencia_digito($param["agenciaDigito"]);
                    $dadosBancarios->setConta($param["conta"]);
                    $dadosBancarios->setConta_digito($param["contaDigito"]);
                    $dadosBancarios->setBanco_id($param["banco"]["id"]);
                    break;
                default: new ExceptionFramework('Tipo não existe',422);
            }

            $dadosBancarios->save();
            $lastIdBanco = $dadosBancarios->lastID();
            return $lastIdBanco;
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}

	public function search($param = null)
	{
		/*Mehtod GET HTTP*/
	}
	public function update($param = null)
	{
		try{
            $dadosBancarios = new \Data\Model\Dados_bancarios();
            
            if(!$param["tipo"])
                new ExceptionFramework('Escolha um tipo de dados bancarios',422);

            $dadosBancarios->setTipo($param["tipo"]);
            switch ($param["tipo"]){
                case 'BOLETO':
                    //não faz nada
                    break;
                case 'DEBITO':
                    $dadosBancarios->setAgencia($param["agencia"]);

                    if(strlen($param["agenciaDigito"]) >1 || $param["agenciaDigito"]<1)
                        new ExceptionFramework('O digito de agencia é obrigatório e aceita apenas um caracter',422);

                    if(strlen($param["contaDigito"]) >1 || $param["contaDigito"]<1)
                        new ExceptionFramework('O digito da conta é obrigatório e aceita apenas um caracter',422);

                    if(!$param["banco"])
                        new ExceptionFramework('Escolha um banco',422);

                    $dadosBancarios->setAgencia_digito($param["agenciaDigito"]);
                    $dadosBancarios->setConta($param["conta"]);
                    $dadosBancarios->setConta_digito($param["contaDigito"]);
                    $dadosBancarios->setBanco_id($param["banco"]["id"]);
                    break;

                case 'FATURA':

                    if(!$param["operadora"])
                        new ExceptionFramework('Escolha uma operadora',422);

                    $dadosBancarios->setAgencia_digito('');
                    $dadosBancarios->setConta('');
                    $dadosBancarios->setConta_digito('');
                    $dadosBancarios->setBanco_id('');

                    $dadosBancarios->setAno($param["ano"]);
                    $dadosBancarios->setMes($param["mes"]);
                    $dadosBancarios->setOperadora_id($param["operadora"]["id"]);
                    $dadosBancarios->setNumero_cartao($param["numeroCartao"]);
                    break;

                case 'HOLERITE':
                    $dadosBancarios->setAgencia($param["agencia"]);

                    if(strlen($param["agenciaDigito"]) >1 || $param["agenciaDigito"]<1)
                        new ExceptionFramework('O digito de agencia é obrigatório e aceita apenas um caracter',422);

                    if(strlen($param["contaDigito"]) >1 || $param["contaDigito"]<1)
                        new ExceptionFramework('O digito da conta é obrigatório e aceita apenas um caracter',422);

                    if(!$param["banco"])
                        new ExceptionFramework('Escolha um banco',422);

                    if(!$param["operadora"])
                        new ExceptionFramework('Escolha uma operadora',422);

                    $dadosBancarios->setAno($param["ano"]);
                    $dadosBancarios->setMes($param["mes"]);
                    $dadosBancarios->setOperadora_id($param["operadora"]["id"]);
                    $dadosBancarios->setNumero_cartao($param["numeroCartao"]);
                    $dadosBancarios->setAgencia_digito($param["agenciaDigito"]);
                    $dadosBancarios->setConta($param["conta"]);
                    $dadosBancarios->setConta_digito($param["contaDigito"]);
                    $dadosBancarios->setBanco_id($param["banco"]["id"]);
                    break;
                default: new ExceptionFramework('Tipo não existe',422);
            }
            $dadosBancarios->where('id','=',$param['id']);
            $dadosBancarios->update();
            $lastIdBanco = $dadosBancarios->lastID();
            return $lastIdBanco;
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}
	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}
}