<?php

namespace Core;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'Config' . DIRECTORY_SEPARATOR . 'Config.class.php';

use SkyfallFramework\App\Start;
use Config\Config;

try{
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Database.ini';
    $obj = new Start();
    $obj->load();
    Config::$file_connection = $file_connection;
    new Config();
    $obj->run();
}catch (\Exception $e){
    echo \json_encode(["msg"=>$e->getMessage()]);
}