<?php

namespace Config;


use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Exception\ExceptionFramework;

class Config
{
    static $file_connection;

    public function __construct()
    {
        if(!file_exists(Config::$file_connection))
            new ExceptionFramework('Arquivo não existe');

        $array = \parse_ini_file(Config::$file_connection);
        Connection::$list_connection = $array;
    }

    public function config()
    {
        $this->config_routes();
    }

    private function config_routes()
    {
        $routes = new \SkyfallFramework\Common\Routes\Routes();
        $routes->addRoutes([
            'GET'=>
                [
                    '/Usuario/Pessoa'=>
                        [
                            'Controller'=>'Pessoa',
                            'Function'=>'getTbName'
                        ],

                    '/Usuario/Cliente'=>
                        [
                            'Controller'=>'Pessoa',
                            'Function'=>'savePessoa',
                            'Params'=>[
                                'nome',
                                'email'
                            ],
                            "auth"=>true
                        ]
                ],
            'POST'=>
                [
                    '/Usuario/Cliente'=>
                        [
                            'Controller'=>'Usuario',
                            'Function'=>'POST'
                        ],
                    '/Usuario/Produto'=>
                        [
                            'Controller'=>'Produto',
                            'Function'=>'salvar'
                        ]
                ]
        ]);
    }
}