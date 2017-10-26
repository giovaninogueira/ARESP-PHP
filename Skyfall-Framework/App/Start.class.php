<?php

namespace App;
use Common\Kernel\Controller\Routes;

spl_autoload_register(function($className){
    $type = \explode('\\',$className);
    $name = '';
    switch ($type[2]){
        case 'Interfaces':$name = '.interface.';
        break;
        case 'Controller':
        case 'Model':
            $name = '.class.';
        break;
        case 'Traits':$name = '.trait.';
        break;
    };
    $file = __DIR__ . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR .
        str_replace(['\\','/'],DIRECTORY_SEPARATOR, $className) . $name .'php';
    if(!file_exists($file))
        throw new \Exception('Arquivo não encontardo em '.$file);
    require_once $file;
});


class Start{
    static $path = 'Common'.DIRECTORY_SEPARATOR.'Kernel'.
                    DIRECTORY_SEPARATOR.'Controller'.DIRECTORY_SEPARATOR;
    public function run() {
        $obj = new Routes();
        $obj->onRoutes();
    }
}