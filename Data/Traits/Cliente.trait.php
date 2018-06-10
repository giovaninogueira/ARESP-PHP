<?php

/**
* Skyfall Micro-Framework
* Generate ORM Trait
* Version 1.0.0
*/

namespace Data\Traits;


trait Cliente
{
	public function ____construct()
	{

	}

	protected $cancelamento; 
	// References - cancelamento 

	protected $dados_bancarios; 
	// References - dados_bancarios 

	protected $endereco; 
	// References - endereco 

	protected $grupo_recebimento; 
	// References - grupo_recebimento 

	protected $secretaria; 
	// References - secretaria 

	protected $tipo_socio; 
	// References - tipo_socio 

	protected $id; 
	// int(11) 

	protected $cadastro; 
	// datetime 

	protected $entrada; 
	// datetime 

	protected $cpf; 
	// varchar(20) 

	protected $rg; 
	// varchar(15) 

	protected $nome; 
	// varchar(70) 

	protected $sexo; 
	// char(1) 

	protected $pai; 
	// varchar(70) 

	protected $mae; 
	// varchar(70) 

	protected $estado_civil; 
	// varchar(20) 

	protected $obs; 
	// varchar(255) 

	protected $email; 
	// varchar(70) 

	protected $nascimento; 
	// datetime 

	protected $situacao; 
	// varchar(20) 

	protected $num_averbacao; 
	// varchar(45) 

	protected $matricula; 
	// varchar(20) 

	protected $ativo; 
	// tinyint(4) 

	protected $endereco_id; 
	// int(11) 

	protected $tipo_socio_id; 
	// int(11) 

	protected $cancelamento_id; 
	// int(11) 

	protected $secretaria_id; 
	// int(11) 

	protected $dados_bancarios_id; 
	// int(11) 

	protected $grupo_recebimento_id; 
	// int(11) 


	public function setCancelamento( $cancelamento)
	{
		$this->cancelamento = $cancelamento;
	}


	public function getCancelamento()
	{
		return $this->cancelamento;
	}


	public function setDados_bancarios( $dados_bancarios)
	{
		$this->dados_bancarios = $dados_bancarios;
	}


	public function getDados_bancarios()
	{
		return $this->dados_bancarios;
	}


	public function setEndereco( $endereco)
	{
		$this->endereco = $endereco;
	}


	public function getEndereco()
	{
		return $this->endereco;
	}


	public function setGrupo_recebimento( $grupo_recebimento)
	{
		$this->grupo_recebimento = $grupo_recebimento;
	}


	public function getGrupo_recebimento()
	{
		return $this->grupo_recebimento;
	}


	public function setSecretaria( $secretaria)
	{
		$this->secretaria = $secretaria;
	}


	public function getSecretaria()
	{
		return $this->secretaria;
	}


	public function setTipo_socio( $tipo_socio)
	{
		$this->tipo_socio = $tipo_socio;
	}


	public function getTipo_socio()
	{
		return $this->tipo_socio;
	}


	public function setId($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setCadastro($cadastro)
	{
		$this->cadastro = $cadastro;
	}


	public function getCadastro()
	{
		return $this->cadastro;
	}


	public function setEntrada($entrada)
	{
		$this->entrada = $entrada;
	}


	public function getEntrada()
	{
		return $this->entrada;
	}


	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}


	public function getCpf()
	{
		return $this->cpf;
	}


	public function setRg($rg)
	{
		$this->rg = $rg;
	}


	public function getRg()
	{
		return $this->rg;
	}


	public function setNome($nome)
	{
		$this->nome = $nome;
	}


	public function getNome()
	{
		return $this->nome;
	}


	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}


	public function getSexo()
	{
		return $this->sexo;
	}


	public function setPai($pai)
	{
		$this->pai = $pai;
	}


	public function getPai()
	{
		return $this->pai;
	}


	public function setMae($mae)
	{
		$this->mae = $mae;
	}


	public function getMae()
	{
		return $this->mae;
	}


	public function setEstado_civil($estado_civil)
	{
		$this->estado_civil = $estado_civil;
	}


	public function getEstado_civil()
	{
		return $this->estado_civil;
	}


	public function setObs($obs)
	{
		$this->obs = $obs;
	}


	public function getObs()
	{
		return $this->obs;
	}


	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function getEmail()
	{
		return $this->email;
	}


	public function setNascimento($nascimento)
	{
		$this->nascimento = $nascimento;
	}


	public function getNascimento()
	{
		return $this->nascimento;
	}


	public function setSituacao($situacao)
	{
		$this->situacao = $situacao;
	}


	public function getSituacao()
	{
		return $this->situacao;
	}


	public function setNum_averbacao($num_averbacao)
	{
		$this->num_averbacao = $num_averbacao;
	}


	public function getNum_averbacao()
	{
		return $this->num_averbacao;
	}


	public function setMatricula($matricula)
	{
		$this->matricula = $matricula;
	}


	public function getMatricula()
	{
		return $this->matricula;
	}


	public function setAtivo($ativo)
	{
		$this->ativo = $ativo;
	}


	public function getAtivo()
	{
		return $this->ativo;
	}


	public function setEndereco_id($endereco_id)
	{
		$this->endereco_id = $endereco_id;
	}


	public function getEndereco_id()
	{
		return $this->endereco_id;
	}


	public function setTipo_socio_id($tipo_socio_id)
	{
		$this->tipo_socio_id = $tipo_socio_id;
	}


	public function getTipo_socio_id()
	{
		return $this->tipo_socio_id;
	}


	public function setCancelamento_id($cancelamento_id)
	{
		$this->cancelamento_id = $cancelamento_id;
	}


	public function getCancelamento_id()
	{
		return $this->cancelamento_id;
	}


	public function setSecretaria_id($secretaria_id)
	{
		$this->secretaria_id = $secretaria_id;
	}


	public function getSecretaria_id()
	{
		return $this->secretaria_id;
	}


	public function setDados_bancarios_id($dados_bancarios_id)
	{
		$this->dados_bancarios_id = $dados_bancarios_id;
	}


	public function getDados_bancarios_id()
	{
		return $this->dados_bancarios_id;
	}


	public function setGrupo_recebimento_id($grupo_recebimento_id)
	{
		$this->grupo_recebimento_id = $grupo_recebimento_id;
	}


	public function getGrupo_recebimento_id()
	{
		return $this->grupo_recebimento_id;
	}


}