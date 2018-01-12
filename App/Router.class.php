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
        $routes->addRoutes('GET','/Socio/Tipo/Lista','Tipo_socio','getList',false);
        $routes->addRoutes('POST','/Usuario/Login','Usuario','login',false,['email','senha']);
        $routes->addRoutes('POST','/Cliente/Save','Cliente','Save',false,
            ['nome','cpf','rg','nome_pai','nome_mae','data_nascimento','observacao','email','sexo','estado_civil','tipo_socio']);
    }
}