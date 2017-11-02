<?php

namespace Config;

use SkyfallFramework\Common\Routes\Routes as model;

class Config{

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
                            'Function'=>'savePessoa'
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