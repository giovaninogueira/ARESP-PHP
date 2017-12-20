<?php

namespace SkyfallFramework\Common\Database;

/**
 * Class Connection
 * @package SkyfallFramework\Common\Database
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Connection extends \PDO
{
    static $list_connection;
    static $script;
    static $connection;
    private $transaction;

    /**
     * Connection constructor.
     * @details Realiza a conexão com o banco de dados
     */
    public function __construct()
    {
        try
        {
            $array = static::$list_connection;
            parent::__construct(
                'mysql:host='.$array['HOST'].';'.
                'dbname='.$array['DATABASE'],
                $array['USER'],
                $array['PASSWORD'],
                array(parent::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }
        catch (\Exception $e)
        {
            new ExceptionFramework('Erro na hora de conectar, verifique os parametros de conexão');
            die;
        }
    }

    /**
     * @details Fechar coneção no banco de dados
     */
    public function closeConnection()
    {
        self::$connection = null;
    }
}