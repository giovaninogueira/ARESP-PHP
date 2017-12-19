<?php

namespace Config;


use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Config
{
    static $file_connection;

    public function __construct()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
        header('Access-Control-Max-Age: 86400');
        header('Token: Bearer');

        if(!file_exists(Config::$file_connection))
            new ExceptionFramework('Arquivo não existe');

        $array = \parse_ini_file(Config::$file_connection);
        Connection::$list_connection = $array;
    }

    public function config()
    {
        $routes = new \SkyfallFramework\Common\Routes\Routes();

        $routes->addteste('GET','/Usuario/Pessoa','Pessoa','getTbName',true, ['nome','email']);
        $routes->addteste('GET','/Usuario/Cliente','Pessoa','getTbName',true);

        /*$routes->addRoutes([
            'GET'=>
                [
                    '/Usuario/Pessoa'=>
                        [
                            'Controller'=>'Pessoa',
                            'Function'=>'getTbName',
                        ],

                    '/Usuario/Cliente'=>
                        [
                            'Controller'=>'Pessoa',
                            'Function'=>'savePessoa',
                            'Params'=>[
                                'nome',
                                'email'
                            ]
                        ]
                ],
            'POST'=>
                [
                    '/Usuario/Cliente'=>
                        [
                            'Controller'=>'Pessoa',
                            'Function'=>'getTbName',
                            'auth' => true
                        ],
                    '/Usuario/Produto'=>
                        [
                            'Controller'=>'Produto',
                            'Function'=>'salvar'
                        ]
                ]
        ]);*/
    }
}