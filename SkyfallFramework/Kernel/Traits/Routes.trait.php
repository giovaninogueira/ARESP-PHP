<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Sessions\Session;
use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Utils\Utils;

/**
 * Trait Routes
 * @package SkyfallFramework\Kernel\Traits
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
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

    public function __construct()
    {
        new Utils();
    }

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

    /**
     * @param $method
     * @param $url
     * @param $controller
     * @param $function
     * @param null $auth
     * @param null $params
     * @details Adiciona na lista statica a lista de rotas
     */
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

    /**
     * @details Recupera o metodd HTTP e a URL
     */
    public function onRoutes()
    {
        $this->setMethodHTTP($_SERVER['REQUEST_METHOD']);
        $this->setUrl($_SERVER['PATH_INFO']);
        $this->callFunction();
    }


    /**
     * @details Chama a função inserida na lista conforme a URL
     */
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
                echo json_encode($controller->{$function}($object));
            }
            else
                echo json_encode($controller->{$function}(null));
        }
        else
            echo json_encode($controller->{$function}());
    }

    /**
     * @details verificando se a rota deve receber parametros junto a URL
     */
    private function getParamsRoutes($paramsObj)
    {
        $lista = [];

        if(is_object(Utils::$request))
            $array = get_object_vars(Utils::$request);
        else
            $array = [];

        $count_Request = count($array);
        $count_Params = count($paramsObj['Params']);

        if (!($count_Params == $count_Request))
            new ExceptionFramework(403);

        if(!is_null($paramsObj['Params']))
        {
            foreach ($paramsObj['Params'] as $params)
            {
                if (!key_exists($params, $array))
                    new ExceptionFramework(422);

                $lista[$params] = $array[$params];
            }
            $this->setParams($lista);
        }
        return $paramsObj;
    }

    private function rulesRoutes()
    {
        /**
         * @details Verificando se a rota permitite o metodo HTTP
         */
        if(!key_exists($this->getMethodHTTP(),Routes::$listaRoutes))
            new ExceptionFramework(405);
        $routes = Routes::$listaRoutes[$this->getMethodHTTP()];

        /**
         * @details Validando se a URL tem nas rotas
         */
        if(!key_exists($this->getUrl(),$routes))
            new ExceptionFramework(405);

        $this->setObjRoutes($routes[$this->getUrl()]);

        /**
         * @details Validando Token
         */
        if($this->objRoutes['Auth'])
            $this->validateToken();
        else
            Session::createSession();

        return $this->getParamsRoutes($this->getObjRoutes());
    }

    /**
     * @details Validando Token
     */
    private function validateToken()
    {
        $headers = getallheaders();

        if(!isset($headers['token']))
            new ExceptionFramework('Token não informado');

        Utils::$token = $headers['token'];
        Auth::authentication(Utils::$token);
        Session::sessionStart();
    }

}