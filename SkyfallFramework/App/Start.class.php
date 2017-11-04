<?php

namespace SkyfallFramework\App;
use SkyfallFramework\Common\Routes\Routes;

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

            $index = 3;

            if(!key_exists(3,$type))
                $index = 1;

            $this->pathFunc = $type[$index];
            $name = '';

            if($type[$index] == 'Interfaces')
                $name = '.interface.';
            else if($type[$index] == 'Traits')
                $name = '.trait.';
            else
                $name = '.class.';

            $file = __DIR__ . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.
                str_replace(['\\','/'],DIRECTORY_SEPARATOR, $className) . $name .'php';

            if(!file_exists($file))
                throw new \Exception('Arquivo não encontardo em '.$file);
            require_once $file;
        });
    }
}