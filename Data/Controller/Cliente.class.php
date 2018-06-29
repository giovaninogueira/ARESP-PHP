<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use Data\Model\Cliente as modelCliente;
use SkyfallFramework\Common\Utils\Utils;

class Cliente
{
	/**
	* Skyfall Micro-Framework
	* Controller's body
	* Version 1.0.0
	**/
	public function create($param = null)
	{
		try{
		    Model::$connection->beginTransaction();
            $cliente = new modelCliente();
		    $this->verificarEmailCPFRG($cliente, $param);
		    $endereco = new Endereco();
            $lastIdEnd = $endereco->create($param["endereco"]);
            $dadosBancarios = new Dados_bancarios();
            $lastIdBanco = $dadosBancarios->create($param["dadosBancarios"]);
            if($lastIdBanco){
                $cliente->setDados_bancarios_id($lastIdBanco);
            }
            /**
             * @details Cliente
             */
            $cliente->setCpf($param["cpf"]);
            $cliente->setRg($param["rg"]);
            $cliente->setNome($param["nome"]);
            $cliente->setNascimento($param["nascimento"]);
            $cliente->setSexo($param["sexo"]);
            $cliente->setPai($param["pai"]);
            $cliente->setMae($param["mae"]);
            $cliente->setEmail($param["email"]);
            $cliente->setEstado_civil($param["estadoCivil"]);
            $cliente->setTipo_socio_id($param["tipo"]);
            $cliente->setSecretaria_id($param["secretaria"]["id"]);
            $cliente->setObs($param["obs"]);
            $cliente->setEndereco_id($lastIdEnd);
            
            $cliente->setCadastro(date('Y-m-d h:i:s'));
            $cliente->setEntrada(date('Y-m-d h:i:s'));
            $cliente->setSituacao($param["situacao"]);
            $cliente->setGrupo_recebimento_id($param["grupo"]["id"]);
            $cliente->setNum_averbacao($param["numAverbacao"]);
            $cliente->setAtivo($param["ativo"]);
            $cliente->setMatricula($param["matricula"]);
            $cliente->save();
            $lastIdCliente = $cliente->lastID();

            /**
             * @details os loops de dependentes e telefone
             */
            if(isset($param["dependentes"])){
                foreach ($param["dependentes"] as $index=>$value){
                    $dependente = new \Data\Controller\Dependente();
                    $value["idCliente"] = $lastIdCliente;
                    $dependente->create($value);
                }
            }
            if(isset($param["telefones"])){
                foreach ($param["telefones"] as $index=>$value){
                    $telefone = new \Data\Controller\Telefone();
                    $value["idCliente"] = $lastIdCliente;
                    $telefone->create($value);
                }
            }
            Model::$connection->commit();
            return json_encode(["result"=>"Cadastro efetuado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            Model::$connection->rollBack();
		    new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}

	public function validarCampo($param)
    {
        if(!$param["nome"])
            new ExceptionFramework('O campo nome é obrigatório',422);
        if(!$param["sexo"])
            new ExceptionFramework('O campo sexo é obrigatório',422);
        if(!$param["situacao"])
            new ExceptionFramework('Situacaoé obrigatório',422);
    }

	public function search($param = null)
	{
		try{
		    $cliente = new modelCliente();
            $cliente->viewSelect([
                'id','cadastro','entrada','cpf','rg','nome','sexo','pai','mae','ativo',
                'cadastro','num_averbacao as numAverbacao','matricula',
                'estado_civil as estadoCivil','obs','email','nascimento','situacao','matricula','endereco_id as endereco',
                'tipo_socio_id as tipo','cancelamento_id as cancelamento','secretaria_id as secretaria',
                'dados_bancarios_id as "dadosBancarios"','grupo_recebimento_id as grupo'
            ]);
            $listCliente = null;
		    if($param){
                $cliente->where('id','=',$param["id"]);
                $result = $cliente->select();
                $listCliente = $this->find($result);
            }else{
                $listCliente = $cliente->selectAll();
                foreach ($listCliente as $index=>$obj){
                    $listCliente[$index] = $this->find($obj);
                }
            }
            return $listCliente;
        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage());
        }
	}

	public function find($obj)
    {
        $idDadosBancarios = $obj["dadosbancarios"];
        $tipo = $obj["estadocivil"];
        unset($obj["dadosbancarios"]);
        unset($obj["estadocivil"]);
        $obj["dadosBancarios"] = $idDadosBancarios;
        $obj["estadoCivil"] = $tipo;
        $endereco = new \Data\Model\Endereco();
        $endereco->where('id','=',$obj["endereco"]);
        $listEndereco = $endereco->select();
        $obj["endereco"] = $listEndereco;
        $dadosBancarios = new \Data\Model\Dados_bancarios();
        $dadosBancarios->viewSelect(['id','tipo','agencia','agencia_digito','conta',
            'conta_digito','numero_cartao','mes','ano','operadora_id as operadora',
            'banco_id as banco'
        ]);
        $tipo = new \Data\Model\Tipo_socio();
        $tipo->where('id','=',$obj["tipo"]);
        $obj["tipo"] = $tipo->select();
        $dadosBancarios->where('id','=',$obj["dadosBancarios"]);
        $listDadoBancarios = $dadosBancarios->select();
        $banco = new \Data\Model\Banco();
        $banco->where('id','=',$listDadoBancarios["banco"]);
        $listBanco = $banco->select();
        $listDadoBancarios["banco"] = $listBanco;
        $operadora = new \Data\Model\Operadora();
        $operadora->where('id','=',$listDadoBancarios["operadora"]);
        $listaAgencia = $operadora->select();
        $listDadoBancarios["operadora"] = $listaAgencia;
        $obj["dadosBancarios"] = $listDadoBancarios;

        $dependentes = new \Data\Model\Dependente();
        $dependentes->where('id','=',$obj["id"]);
        $listDependentes = $dependentes->select();
        $obj["dependentes"] = $listDependentes;

        $telefone = new \Data\Model\Telefone();
        $telefone->where('id','=',$obj["id"]);
        $listTelefone = $telefone->select();
        $obj["telefones"] = $listTelefone;
        $obj['secretaria'] = new \stdClass();
        return $obj;
    }

    private  function verificarEmailCPFRG($cliente, $param,$id = 0)
    {
        try{
            $cliente->where('email','=',$param["email"],'and')
                ->where('id','!=',$id);
            $listResult = $cliente->select();

            if($listResult){
                new ExceptionFramework("Email já está sendo usado em outro cadastro.",401);
            }

            $cliente->where('cpf','=',$param["cpf"],'and')
                ->where('id','!=',$id);
            $result = $cliente->select();

            if($result){
                new ExceptionFramework("o CPF já está sendo usado em outro cadastro.", 401);
            }

            $cliente->where('rg','=',$param["rg"],'and')
                ->where('id','!=',$id);
            $listResult = $cliente->select();

            if($listResult){
                new ExceptionFramework("RG já está sendo usado em outro cadastro.", 401);
            }

        }catch (\Exception $e){
            new ExceptionFramework($e->getMessage(), $e->getCode());
        }
    }


	public function update($param = null)
	{
		/*Mehtod PUT HTTP*/
	}

	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

	public function verificarCampos($param)
    {

    }

}