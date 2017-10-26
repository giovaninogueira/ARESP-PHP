<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Skyfall-Framework' . DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
             .'Start.class.php';

try{
    $routes = new Common\Kernel\Controller\Routes();
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
    $obj = new \App\Start();
    $obj->run();
}catch (\Exception $e){
    echo $e->getMessage();
}
