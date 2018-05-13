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
        $routes->post('/Tarefas/Teste', 'Tarefas')->contents(['login','senha'])->auth(false);
        $routes->get('/Tarefas/Teste/:id/:status', 'Tarefas')->contents(['login','senha'])->auth(false);
        $routes->delete('/Tarefas/Teste/:id/:status', 'Tarefas')->auth(false);
        $routes->put('/Tarefas/Teste/:id/:status', 'Tarefas')->auth(false);
    }
}