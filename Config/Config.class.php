<?php

namespace Config;

use Common\Routes\Routes;

class Config{

    public function config()
    {
        $this->config_routes();
    }

    private function config_routes()
    {
        $routes = new Routes();
        $routes->addRoutes([
            'GET'=>
                [
                    '/Usuario/Pessoa'=>
                        [
                            'Controller'=>'Usuario',
                            'Function'=>'teste'
                        ],

                    '/Usuario/Cliente'=>
                        [
                            'Controller'=>'PPPP',
                            'Function'=>'vwefwe',
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