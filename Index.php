<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'SkyfallFramework' .DIRECTORY_SEPARATOR . 'App' .DIRECTORY_SEPARATOR
             .'Start.class.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Config.class.php';

try{
    $obj = new \App\Start();
    $obj->load();
    $routes = new \Config\Config();
    $routes->config();
    $obj->run();
}catch (\Exception $e){
    echo $e->getMessage();
}
