<?php

namespace App;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

use SkyfallFramework\App\Start;
use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\ORM\ORM;

try{
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Database.ini';
    new Start();
    Connection::$list_connection = $file_connection;
    Model::$connection = new Connection();
    $orm = new ORM();
    $orm->generateORM();
}catch (\Exception $e){
    echo $e->getMessage();
}