<?php

namespace Config;


use SkyfallFramework\Common\Auth\Auth;
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
        $routes = new \SkyfallFramework\Common\Routes\Routes();
        $routes->addRoutes('GET','/Usuario/Pessoa','Pessoa','getTbName',true, ['nome','email']);
        $routes->addRoutes('GET','/Usuario/Cliente','Pessoa','getTbName',true);
        $routes->addRoutes('POST','/Usuario/Pessoa','Pessoa','getTbName',true, ['nome','email']);
    }
}