<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Sessions\Session;
use \SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Utils\Utils;

Trait Routes{

    private $routesModel;

    private static $name_space = 'MVC\\Controller\\';

    private $url;

    private $methodHttp;

    private $method;

    private $params = array();

    private $objRoutes;

    static  $listaRoutes;

    private $teste = array();

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


    public function addRoutes($method, $url, $controller, $function, $auth = null, $params = null)
    {
        $array = [
            'Controller' => $controller,
            'Function' => $function,
            'Auth' => $auth,
            'Params' => $params
        ];
        Routes::$listaRoutes[$method][$url] = $array;
    }

    public function onRoutes()
    {
        $session = new Session();
        $utils = new Utils();
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

        if(!\method_exists($controller, $function))
            new ExceptionFramework(405);

        $reflection_function = new \ReflectionMethod($controller, $function);

        if(count($reflection_function->getParameters()) != 0)
        {
            if(count($this->getParams()) != 0)
            {
                $params = $this->getParams();
                $object = (object)$params;
                $controller->{$function}($object);
            }
            else
                new ExceptionFramework('Função necessitade de um parametro');
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
            $array = get_object_vars(Utils::$request);
            $count_Request = count($array);
            $count_Params = count($paramsObj['Params']);

            if (!($count_Params == $count_Request))
                new ExceptionFramework(402);

            foreach ($paramsObj['Params'] as $params)
            {
                if (!key_exists($params, $array))
                    new ExceptionFramework(402);
                $lista[$params] = $array[$params];
            }
            $this->setParams($lista);
        }
        return $paramsObj;
    }

    private function rulesRoutes()
    {
        $t = Utils::$request;
        /*Verificando se a rota permitite o metodo HTTP*/
        if(!key_exists($this->getMethodHTTP(),Routes::$listaRoutes))
            new ExceptionFramework(405);
        $routes = Routes::$listaRoutes[$this->getMethodHTTP()];

        /*Validando se a URL tem nas rotas*/
        if(!key_exists($this->getUrl(),$routes))
            new ExceptionFramework(405);
        $this->setObjRoutes($routes[$this->getUrl()]);
        /*if(key_exists('auth',$this->objRoutes))
            $this->validateToken();*/
        return $this->getParamsRoutes($this->getObjRoutes());
    }

    private function validateToken()
    {
        $headers = getallheaders();
        if(!isset($headers['Token']))
            new ExceptionFramework('Token não informado');
        $auth = new Auth(
            [
                'iat' => 86400000,
                'iss' => 'teste.com.br',
                'nbf' => 86400000,
                'data' => 'User'
            ]
        );
       Auth::authentication($auth->token);
    }

}