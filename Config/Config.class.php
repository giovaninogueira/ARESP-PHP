<?php

namespace Config;

/**
 * @details Uses nescessários para usar o framework
 */
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Routes\Routes;
use SkyfallFramework\Common\Utils\Utils;

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
        new Utils();
        Utils::addHeaders('Content-Type: application/json');
        Utils::addHeaders('Access-Control-Allow-Origin: *');
        Utils::addHeaders('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
        Utils::addHeaders('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        Utils::addHeaders('Access-Control-Max-Age: 86400');

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
        $routes->addRoutes('GET','/Usuario/Cliente','Pessoa','getTbName',false);
        $routes->addRoutes('POST','/Usuario/Pessoa','Pessoa','getTbName',true, ['email','ts']);
    }
}