<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Exception\ExceptionFramework;

Trait Routes{

    private $routesModel;

    private static $name_space = 'MVC\\Controller\\';

    private $url;

    private $methodHttp;

    private $method;

    private $params = array();

    private $objRoutes;

    static  $listaRoutes;

    public function setRoutesModel($routesModel)
    {
        $this->routesModel = $routesModel;
    }

    public function getRoutesModel()
    {
        return $this->routesModel;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setMethodHTTP($methodHttp)
    {
        $this->methodHttp = $methodHttp;
    }

    public function getMethodHTTP()
    {
        return $this->methodHttp;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setParams($params)
    {
        $this->params=$params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setObjRoutes($objRoutes)
    {
        $this->objRoutes = $objRoutes;
    }

    public function getObjRoutes()
    {
        return $this->objRoutes;
    }

    public function addRoutes($array)
    {
        Routes::$listaRoutes=$array;
    }

    public function offRoute($url, $methodHttp)
    {

    }

    public function onRoutes()
    {
        $this->setMethodHTTP($_SERVER['REQUEST_METHOD']);
        $this->setUrl($_SERVER['PATH_INFO']);
        $this->callFunction();
    }

    private function runFunction()
    {
        $this->getParams();
    }

    private function callFunction()
    {
        $array = $this->rulesRoutes();
        $name_controller = 'MVC\\Controller\\' . $array['Controller'];
        $function = $array['Function'];
        $controller = new $name_controller;
        $params = [];

        if(count($this->getParams()) != 0)
            $params = $this->getParams();

        if(!\method_exists($controller, $function))
            new ExceptionFramework(405);

        $reflection_function = new \ReflectionMethod($controller, $function);

        if(count($reflection_function->getParameters()) != 0)
        {
            $object = (object)$params;
            $controller->{$function}($object);
        }

        else
            $controller->{$function}();
    }

    private function getParamsRoutes($paramsObj)
    {
        $lista = [];

        /*verificando se a rota deve receber parametros junto a URL*/

        if(key_exists('Params',$paramsObj))
        {
            $count_Request = count($_REQUEST);
            $count_Params = count($paramsObj['Params']);

            if (!($count_Params == $count_Request))
                new ExceptionFramework(402);

            foreach ($paramsObj['Params'] as $params)
            {
                if (!key_exists($params, $_REQUEST))
                    throw new \Exception(402);
                $lista[$params] = $_REQUEST[$params];
            }
            $this->setParams($lista);
        }
        return $paramsObj;
    }

    public function rulesRoutes()
    {
        /*Verificando se a rota permitite o metodo HTTP*/
        if(!key_exists($this->getMethodHTTP(),Routes::$listaRoutes))
            new ExceptionFramework(405);

        $routes = Routes::$listaRoutes[$this->getMethodHTTP()];

        /*Validando se a URL tem nas rotas*/
        if(!key_exists($this->getUrl(),$routes))
            new ExceptionFramework(405);

        $this->setObjRoutes($routes[$this->getUrl()]);

        /*if(key_exists('auth',$this->routesModel->setObjRoutes()))
            if(key_exists('token',$_REQUEST))*/

        return $this->getParamsRoutes($this->getObjRoutes());
    }

}