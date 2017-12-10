<?php

namespace SkyfallFramework\Kernel\Traits;

use \Firebase\JWT\JWT;

trait Auth
{
    /*
     * Autenticando usuário
     * */
    public function authentication()
    {

    }

    /*  Realiza as verificações das
        regras para validar o token recebido
     */
    public function validationToken($token)
    {

    }

    /*
     * Criando Token conforme as regras inseridas
     * */
    public function createToken()
    {

    }

    /*
     * Recebe como parametro um vetor com as regras para
     * criar o token
     * OBS:: A chave do token deve está em uma variavé static em um arquivo .ini
     * como segurança
     * */
    public function setRules($rules)
    {

    }
}