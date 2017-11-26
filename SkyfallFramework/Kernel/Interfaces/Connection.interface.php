<?php

namespace SkyfallFramework\Kernel\Interfaces;

interface Connection
{

    /*abri a conexão conforme o nome do banco de dados*/
    public function __construct();

    /*fechar coneção no banco de dados*/
    public function closeConnection();

}