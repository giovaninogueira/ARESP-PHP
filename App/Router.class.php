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
        $routes->addRoutes('GET','/Usuario/Pessoa/:id/lista/:numero','Pessoa','getTbName',false);
        $routes->addRoutes('GET','/Usuario/Cliente/teste','Pessoa','getTbName',true);
        $routes->addRoutes('GET','/Usuario/Cliente','Pessoa','getTbName',false);
        $routes->addRoutes('POST','/Usuario/Pessoa','Pessoa','getTbName',false);
        $routes->addRoutes('GET','/Usuario/Pessoa/:id/teste/:numero','Pessoa','getSla',true);
    }
}