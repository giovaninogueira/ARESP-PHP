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
            $cliente->setTipo_socio_id($param["tipo"]['id']);
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
                    $dependente = new Dependente();
                    $value["cliente_id"] = $lastIdCliente;
                    $dependente->create($value);
                }
            }
            if(isset($param["telefones"])){
                foreach ($param["telefones"] as $index=>$value){
                    $telefone = new Telefone();
                    $value["cliente_id"] = $lastIdCliente;
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
                $cliente->where('id','=',$param["id"],'and');
                $cliente->where('cancelamento_id','=','null');
                $result = $cliente->select();
                $listCliente = $this->find($result);
            }else{
                $cliente->where('CANCELAMENTO_ID','=','null');
                $listCliente = $cliente->select();
                var_dump($listCliente);
                die;
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
        
        $grupo = new \Data\Model\Grupo_recebimento();
        $grupo->where('id','=',$obj['grupo']);
        $obj['grupo'] = $grupo->select();

        $tipo = new \Data\Model\Tipo_socio();
        $tipo->where('id','=',$obj["tipo"]);
        $obj["tipo"] = $tipo->select();

        $dadosBancarios = new \Data\Model\Dados_bancarios();
        $dadosBancarios->viewSelect(['id','tipo','agencia','agencia_digito as agenciaDigito','conta',
            'conta_digito','numero_cartao','mes','ano','operadora_id as operadora',
            'banco_id as banco'
        ]);
        $dadosBancarios->where('id','=',$obj["dadosBancarios"]);
        $listDadoBancarios = $dadosBancarios->select();
        $banco = new \Data\Model\Banco();

        if($listDadoBancarios){
            if($listDadoBancarios['tipo'] == 'BOLETO'){
                $obj["dadosBancarios"] = array();
                $obj["dadosBancarios"]['banco'] = new \stdClass();
                $obj["dadosBancarios"]['operadora'] = new \stdClass();
                $obj["dadosBancarios"]['tipo'] = $listDadoBancarios['tipo'];
            }else{
                $banco->where('id','=',$listDadoBancarios["banco"]);
                $listBanco = $banco->select();
                $listDadoBancarios["banco"] = $listBanco;
                $operadora = new \Data\Model\Operadora();

                $operadora->where('id','=',$listDadoBancarios["operadora"]);
                $listaAgencia = $operadora->select();
                $listDadoBancarios["operadora"] = $listaAgencia;
                $obj["dadosBancarios"] = $listDadoBancarios;

                $auxGrp = $obj["dadosBancarios"]['agenciadigito'];
                $auxGrpContaDigito = $obj["dadosBancarios"]['conta_digito'];
                $auxGrpNumCartao = $obj["dadosBancarios"]['numero_cartao'];
                
                unset($obj["dadosBancarios"]['agenciadigito']);
                unset($obj["dadosBancarios"]['conta_digito']);
                unset($obj["dadosBancarios"]['numero_cartao']);

                $obj["dadosBancarios"]['agenciaDigito'] = $auxGrp;
                $obj["dadosBancarios"]['contaDigito'] = $auxGrpContaDigito;
                $obj["dadosBancarios"]['numeroCartao'] = $auxGrpNumCartao;
            }            
        }else{
            $obj["dadosBancarios"]['banco'] = new \stdClass();
            $obj["dadosBancarios"]['operadora'] = new \stdClass();            
        }

        $dependentes = new \Data\Model\Dependente();
        $resulDep = $dependentes->query('
            select 
                ID as id, NOME as nome, 
                RG as rg, 
                PARENTESCO as parentesco,
                NASCIMENTO as nascimento,
                CLIENTE_ID as cliente_id
            from dependente where cliente_id =:cliente_id
            ',[':cliente_id'=>$obj["id"]]
        );
        $resDep = $resulDep->fetchAll(\PDO::FETCH_ASSOC);
        $listDependentes = $resDep;
        $obj["dependentes"] = $listDependentes;

        $telefone = new \Data\Model\Telefone();
        $telefone->viewSelect(['numero','tipo']);
        $resul = $telefone->query('select ID as id, NUMERO as numero, CLIENTE_ID as cliente_id, TIPO as tipo from telefone where cliente_id =:cliente_id',[':cliente_id'=>$obj["id"]]);
        $listTelefone = $resul->fetchAll(\PDO::FETCH_ASSOC);
        $obj["telefones"] = $listTelefone;
        
        $secretaria = new \Data\Model\Secretaria();
        $secretaria->where('id','=',$obj['secretaria']);

        $cancelamento = new \Data\Model\Cancelamento();
        $cancelamento->where('id','=',$obj['cancelamento']);
        $resSecre = $secretaria->select();
        $resCancelamento = $cancelamento->select();

        if(!$resSecre)
            $obj['secretaria'] = new \stdClass();
        else
            $obj['secretaria'] = $resSecre;

        if(!$resCancelamento)
            $obj['cancelamento'] = new \stdClass();
        else
            $obj['cancelamento'] = $resCancelamento;

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
		try{
		    Model::$connection->beginTransaction();
            $cliente = new modelCliente();
		    $this->verificarEmailCPFRG($cliente, $param,$param['id']);
		    $endereco = new Endereco();
            $lastIdEnd = $endereco->update($param["endereco"]);
            $dadosBancarios = new Dados_bancarios();
            $lastIdBanco = $dadosBancarios->update($param["dadosBancarios"]);
        
            if($lastIdBanco){
                $cliente->setDados_bancarios_id($lastIdBanco);
            }
            if($param['cancelamento']){
                $cancelamento = new Cancelamento();
                $lastIDCancelamento = $cancelamento->create($param['cancelamento']);
                $cliente->setCancelamento_id($lastIDCancelamento);
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
            $cliente->setTipo_socio_id($param["tipo"]['id']);
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
            $cliente->where('id','=',$param['id']);
            $cliente->update();
            $lastIdCliente = $cliente->lastID();
            /**
             * @details os loops de dependentes e telefone
             */
            $dep = new \Data\Model\Dependente();
            $dep->where('cliente_id','=',$param['id']);
            $dep->delete();

            $tel = new \Data\Model\Telefone();
            $tel->where('cliente_id','=',$param['id']);
            $tel->delete();

            if(isset($param["dependentes"])){
                foreach ($param["dependentes"] as $index=>$value){
                    $dependente = new Dependente();
                    $value["cliente_id"] = $param['id'];
                    $dependente->create($value);
                }
            }
            if(isset($param["telefones"])){
                foreach ($param["telefones"] as $index=>$value){
                    $telefone = new Telefone();
                    $value["cliente_id"] = $param['id'];
                    $telefone->create($value);
                }
            }
            Model::$connection->commit();
            return json_encode(["result"=>"Cadastro Atualizado com sucesso !","code"=>201]);
        }catch (\Exception $e){
            Model::$connection->rollBack();
		    new ExceptionFramework($e->getMessage(), $e->getCode());
        }
	}

	public function delete($param = null)
	{
		/*Mehtod DELETE HTTP*/
	}

	public function verificarCampos($param)
    {

    }
}