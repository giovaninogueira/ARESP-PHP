<?php

namespace App;
use Common\Routes\Routes;

class Start{

    private $pathFunc = null;

    static $path = 'Common'.DIRECTORY_SEPARATOR.'Kernel'.
                    DIRECTORY_SEPARATOR.'Controller'.DIRECTORY_SEPARATOR;

    public function run()
    {
        $obj = new Routes();
        $obj->onRoutes();
    }

    public function load()
    {
        spl_autoload_register(function($className){
            $type = \explode('\\',$className);
            $this->pathFunc = $type[2];
            $name = '';

            if($type[2] == 'Interfaces')
                $name = '.interface.';
            else if($type[2] == 'Traits')
                $name = '.trait.';
            else
                $name = '.class.';

            $file = __DIR__ . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR .
                str_replace(['\\','/'],DIRECTORY_SEPARATOR, $className) . $name .'php';
            if(!file_exists($file))
                throw new \Exception('Arquivo não encontardo em '.$file);
            require_once $file;
        });
    }
}