<?php

namespace App;

use SkyfallFramework\Common\Routes\Routes;

/**
 * Class Router
 * @package App
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Router
{
    /**
     * @details Configurando rotas
     */
    public static function routes()
    {
        $routes = new Routes();
        $routes->get('/Bancos', 'Banco')->auth(false);
        $routes->get('/Bancos/:id', 'Banco')->auth(false);
        $routes->post('/Banco', 'Banco')->contents(['nome','numero','telefone'])->auth(false);
        $routes->put('/Banco/:id', 'Banco')->contents(['nome','numero','telefone'])->auth(false);
    }
}