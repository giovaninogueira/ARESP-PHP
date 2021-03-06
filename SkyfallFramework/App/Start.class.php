<?php

namespace SkyfallFramework\App;
use SkyfallFramework\Common\Routes\Routes;
use SkyfallFramework\Common\Utils\Utils;

/**
 * Class Start
 * @package SkyfallFramework\App
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Start{

    /**
     * @var null
     */
    private $pathFunc = null;

    public function __construct()
    {
        $this->load();
    }

    /**
     * Instancia o objeto rotas e executa a função onRoutes()
     */
    public function run()
    {
        Utils::configure();
        $obj = new Routes();
        $obj->onRoutes();
    }

    /**
     * @details Realiza um load dos arquivos requisitados
     */
    private function load()
    {
        spl_autoload_register(function($className)
        {
            $type = \explode('\\',$className);

            $index = 2;

            if(count($type) == 3)
                $index = 1;

            $this->pathFunc = $type[$index];

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