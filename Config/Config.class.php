<?php

namespace Config;


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
                            'Controller'=>'Pessoa',
                            'Function'=>'getTbName'
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