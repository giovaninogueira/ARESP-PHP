<?php

namespace SkyfallFramework\Common\Kernel\Traits;

use SkyfallFramework\Common\Kernel\Model\Routes as routesModel;
use SkyfallFramework\Common\Exception\ExceptionFramework;

Trait Routes{

    private $routesModel;
    private static $name_space = 'MVC\\Controller\\';

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

        if(count($this->routesModel->getParams()) != 0)
            $params = $this->routesModel->getParams();

        if(!\method_exists($controller, $function))
            throw new \Exception('Método não existe em rota definida');

        $reflection_function = new \ReflectionMethod($controller, $function);

        if(count($reflection_function->getParameters()) != 0)
        {
            $object = (object)$params;
            $controller->{$function}($object);
        }

        else
            $controller->{$function}();
    }

    private function getParams($paramsObj)
    {
        $lista = [];

        /*verificando se a rota deve receber parametros junto a URL*/

        if(key_exists('Params',$paramsObj))
        {
            $count_Request = count($_REQUEST);
            $count_Params = count($paramsObj['Params']);

            if (!($count_Params == $count_Request))
                throw new \Exception('Não foi enviado todos os parametros');
            foreach ($paramsObj['Params'] as $params)
            {
                if (!key_exists($params, $_REQUEST))
                    throw new \Exception('Parametro Inválido');
                $lista[$params] = $_REQUEST[$params];
            }
            $this->routesModel->setParams($lista);
        }
        return $paramsObj;
    }

    public function rulesRoutes()
    {
        /*Verificando se a rota permitite o metodo HTTP*/
        if(!key_exists($this->routesModel->getMethodHTTP(),routesModel::$listaRoutes))
            throw new \Exception('Não existe nenhuma rota para essa função');

        $routes = routesModel::$listaRoutes[$this->routesModel->getMethodHTTP()];

        /*Validando se a URL tem nas rotas*/
        if(!key_exists($this->routesModel->getUrl(),$routes))
            new ExceptionFramework(null,404);

        $this->routesModel->setObjRoutes($routes[$this->routesModel->getUrl()]);

        /*if(key_exists('auth',$this->routesModel->setObjRoutes()))
            if(key_exists('token',$_REQUEST))*/

        return $this->getParams($this->routesModel->getObjRoutes());
    }

}