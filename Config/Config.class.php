<?php

namespace Config;

/**
 * @details Uses nescessários para usar o framework
 */
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Routes\Routes;

/**
 * Class Config
 * @package Config
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Config
{
    static $file_connection;

    /**
     * Config constructor.
     * @details Verificação do arquivo de conexão, e repassando para lista statica da classe conexão
     */
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

        $this->routes();
    }

    /**
     * @details Configurando rotas
     */
    private function routes()
    {
        $routes = new Routes();
        $routes->addRoutes('GET','/Usuario/Pessoa','Pessoa','getTbName',true, ['nome','email']);
        $routes->addRoutes('GET','/Usuario/Cliente','Pessoa','getTbName',true);
        $routes->addRoutes('POST','/Usuario/Pessoa','Pessoa','getTbName',true, ['nome','email']);
    }
}