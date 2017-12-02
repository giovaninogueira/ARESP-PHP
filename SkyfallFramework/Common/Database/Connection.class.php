<?php

namespace SkyfallFramework\Common\Database;

class Connection extends \PDO
{
    static $list_connection;
    static $script;
    static $connection;
    private $transaction;

    /*abri a conexão conforme o nome do banco de dados*/
    public function __construct()
    {
        try
        {
            $array = static::$list_connection;
            parent::__construct(
                'mysql:host='.$array['HOST'].';'.
                'dbname='.$array['DATABASE'],
                $array['USER'],
                $array['PASSWORD']
            );
        }
        catch (\Exception $e)
        {
            new ExceptionFramework('Erro na hora de conectar, verifique os parametros de conexão');
            die;
        }
    }

    /*fechar coneção no banco de dados*/
    public function closeConnection()
    {
        self::$connection = null;
    }
}