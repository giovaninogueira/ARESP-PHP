<?php

namespace Common\Kernel\Traits;

use Common\Kernel\Model\Routes as routesModel;

Trait Routes{

    private $routesModel;
    private static $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Kernel' . DIRECTORY_SEPARATOR .
                        '..' . DIRECTORY_SEPARATOR . 'Common' .DIRECTORY_SEPARATOR . 'Skyfall-Framework' . DIRECTORY_SEPARATOR.
                        'MVC' . DIRECTORY_SEPARATOR . 'Controller/';

    function  __construct()
    {
        $this->routesModel = new routesModel();
    }

    public function addRoutes($array)
    {
        routesModel::$listaRoutes=$array;
    }
    public function offRoute($url, $methodHttp)
    {

    }
    public function onRoutes()
    {
        $this->routesModel->setMethodHTTP($_SERVER['REQUEST_METHOD']);
        $this->routesModel->setUrl($_SERVER['PATH_INFO']);
        $routes = routesModel::$listaRoutes[$this->routesModel->getMethodHTTP()];
        $this->routesModel->setObjRoutes($routes[$this->routesModel->getUrl()]);
        $this->runFunction();
    }

    private function runFunction()
    {
        if($this->routesModel->getMethodHTTP() == 'GET')
        {
            $this->getParams();
            $this->callFunction();
        }
    }

    private function callFunction()
    {
        $objRoutes = $this->routesModel->getObjRoutes();
        $controller = new $objRoutes['Controller'];
        if(!method_exists($controller,$this->routesModel->getMethod()))
            throw new \Exception('Método inválido');
    }

    private function getParams()
    {
        $paramsObj = $this->routesModel->getObjRoutes();
            if(!(count($paramsObj['Params']) == count($_GET)))
                throw new \Exception('Falta Parametros');
            foreach ($paramsObj['Params'] as $params) {
                if (!key_exists($params, $_GET))
                    throw new \Exception('Parametro Inválido');
                $lista[$params] = $_GET[$params];
            }
        $this->routesModel->setParams($lista);
    }

}