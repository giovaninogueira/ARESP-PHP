<?php

namespace Core;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'Config' . DIRECTORY_SEPARATOR . 'Config.class.php';

use SkyfallFramework\App\Start;
use Config\Config;
use SkyfallFramework\Common\ORM\ORM;

try{
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Database.ini';
    $obj = new Start();
    $obj->load();
    Config::$file_connection = $file_connection;
    $routes = new Config();
    //$routes->config();
    //$obj->run();
    $orm = new ORM();
    $orm->generateORM();
}catch (\Exception $e){
    echo $e->getMessage();
}