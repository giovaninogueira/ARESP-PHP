<?php

namespace SkyfallFramework\Common\Database;

use SkyfallFramework\Common\Exception\ExceptionFramework;

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
            if(!file_exists(static::$list_connection))
                new ExceptionFramework('Arquivo de conexão não existe');

            $array = \parse_ini_file(static::$list_connection);

            parent::__construct(
                'mysql:host='.$array['HOST'].';'.
                'dbname='.$array['DATABASE'],
                $array['USER'],
                $array['PASSWORD']
            );
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
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