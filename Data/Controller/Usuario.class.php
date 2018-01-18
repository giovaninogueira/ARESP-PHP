<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;

class Usuario
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/
    public function login()
    {
        $request = Utils::$request;
        $usuario = new \Data\Model\Usuario();
        $usuario->where('login','=', $request->email,'and');
        $usuario->where('senha','=', $request->senha);
        $result = $usuario->select();

        if(count($result) == 0)
            new ExceptionFramework('email ou senha inválidos',400);

        $pessoa_fisica = new \Data\Model\Pessoa_fisica();
        $pessoa_fisica->where('INSTANCIA_ID','=',$result['PESSOA_FISICA_ID']);
        $result_pessoa = $pessoa_fisica->select();

        if(count($result_pessoa) == 0)
            new ExceptionFramework('email ou senha inválidos',400);

        $token = new Auth(
            [
                "iat" => time(),
                "nbf" => 1357000000,
                "data" => [
                    "userID" => $result['PESSOA_FISICA_ID'],
                    "email" => $request->email,
                    "data_creation_token" => date("Y/m/d H:i:s")
                ]
            ]
        );
        $t = Auth::authentication($token->token);
        return [
            "token" => $token->token,
            "nome" => $result_pessoa['NOME'],
            "email" => $request->email
        ];
    }

    public function teste()
    {
        $obj = new \Data\Model\Usuario();
        $obj->setNome('Testando update2');
        $obj->setSenha('123456789');
        $obj->where('id','=',1);
        $obj->update();
    }
}