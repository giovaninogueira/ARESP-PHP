<?php

namespace Core;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'Config' . DIRECTORY_SEPARATOR . 'Config.class.php';

use SkyfallFramework\App\Start;
use Config\Config;
use SkyfallFramework\Kernel\Traits\Sessions;

try{
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Database.ini';
    $obj = new Start();
    Sessions::validateSessionToken();
    $obj->load();
    Config::$file_connection = $file_connection;
    new Config();
    $obj->run();
}catch (\Exception $e){
    http_response_code($e->getCode());
    echo \json_encode(["msg"=>$e->getMessage()]);
}