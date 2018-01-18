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
        $routes->addRoutes('GET','/Convenio/Lista','Convenio','getList',false);
        $routes->addRoutes('GET','/Empresa/:id','Empresa','getEmpresaById',false);
        $routes->addRoutes('GET','/Cliente/:id','Cliente','getClienteById',false);
        $routes->addRoutes('GET','/Cliente/Lista','Cliente','getList',false);
        $routes->addRoutes('GET','/Empresa/Lista','Empresa','getList',false);
        $routes->addRoutes('POST','/Usuario/Login','Usuario','login',false,['email','senha']);
        $routes->addRoutes('POST','/Convenio/Save','Convenio','save',false,['nome','telefone','obs']);
        $routes->addRoutes('POST','/Empresa/Save','Empresa','save',false,
            ['email','observacao','razao_social','nome_fantasia','cnpj','insc_municipal','insc_estadual','convenio_id']);
        $routes->addRoutes('POST','/Cliente/Save','Cliente','Save',false,
            ['nome','cpf','rg','nome_pai','update', 'id','nome_mae','data_nascimento','observacao','email','sexo','estado_civil','tipo_socio']);
    }
}