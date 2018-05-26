<?php

namespace App;

require_once __DIR__ .DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .
    'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
    .'Start.class.php';

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Router.class.php';

use SkyfallFramework\App\Start;
use App\Router;
use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\Utils\Utils;

try
{
    date_default_timezone_set('America/Sao_Paulo');
    $obj = new Start();
    $file_connection = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Database.ini';
    Connection::$list_connection = $file_connection;
    Model::$connection = new Connection();
    Utils::addHeaders('Content-Type: application/json');
    Utils::addHeaders('Access-Control-Allow-Origin: *');
    Utils::addHeaders('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
    Utils::addHeaders('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
    Utils::addHeaders('Access-Control-Max-Age: 86400');
    Router::routes();
    $obj->run();
}
catch (\Exception $e)
{
    http_response_code($e->getCode());
    echo \json_encode(["msg"=>$e->getMessage()]);
}