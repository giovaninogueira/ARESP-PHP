<?php

namespace SkyfallFramework\Kernel\Traits;

use \PDO;

trait Connection
{
    private static $list_connection;

    /*abri a conexão conforme o nome do banco de dados*/
    public function __construct($name_database = null)
    {

    }

    /*Abrir conexão no banco de dados*/
    public function openConnection()
    {

    }

    /*fechar coneção no banco de dados*/
    public function closeConnection()
    {

    }

    /*buscar as configurações de conexão do banco*/
    public function searchDatabase($name_database = null)
    {

    }

    /*retorna o objeto de conexão*/
    public function returnConnection()
    {

    }
}