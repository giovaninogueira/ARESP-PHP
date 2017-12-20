<?php

namespace SkyfallFramework\Kernel\Interfaces;

/**
 * Interface Connection
 * @package SkyfallFramework\Kernel\Interfaces
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
interface Connection
{

    /*abri a conexão conforme o nome do banco de dados*/
    public function __construct();

    /*fechar coneção no banco de dados*/
    public function closeConnection();

}