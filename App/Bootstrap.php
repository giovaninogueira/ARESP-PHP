<?php

namespace App;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

require_once __DIR__ . DIRECTORY_SEPARATOR . 'App.class.php';

use SkyfallFramework\App\Start;
use App\App;
use SkyfallFramework\Kernel\Traits\Sessions;

try{
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Database.ini';
    $obj = new Start();
    Sessions::validateSessionToken();
    $obj->load();
    App::$file_connection = $file_connection;
    new App();
    $obj->run();
}catch (\Exception $e){
    http_response_code($e->getCode());
    echo \json_encode(["msg"=>$e->getMessage()]);
}