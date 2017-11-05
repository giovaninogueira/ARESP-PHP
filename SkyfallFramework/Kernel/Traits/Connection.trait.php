<?php

namespace SkyfallFramework\Kernel\Traits;

use \PDO;
use \SkyfallFramework\Common\Exception\ExceptionFramework;

trait Connection
{
    static $list_connection;

    public $connection;

    /*abri a conexão conforme o nome do banco de dados*/
    public function __construct()
    {
        try
        {
            $array = static::$list_connection;
            $this->connection = new \PDO('mysql:host='.$array['HOST'].';'.
                'dbname='.$array['DATABASE'],
                $array['USER'],
                $array['PASSWORD']
            );
            return $this->connection;
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
        $this->connection = null;
    }

    /*recebe uma lista de banco de dados*/
    public function setDatbases($array)
    {

    }

    /*buscar as configurações de conexão do banco*/
    public function searchDatabase($name_database = null)
    {

    }
}