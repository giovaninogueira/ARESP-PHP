<?php

namespace SkyfallFramework\Common\Routes;

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Utils\Utils;
use SkyfallFramework\Common\RestFull\RestFull;
use SkyfallFramework\Common\Routes\RestFull as restfullAPI;

/**
 * Class Routes
 * @package SkyfallFramework\Common\Routes
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Routes extends restfullAPI
{
    private static $name_space = 'Data\\Controller\\';
    private $params = array();
    private $objRoutes;
    static  $listaRoutes;

    public function __construct()
    {
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
     * @details Recupera o metodd HTTP e a URL
     */
    public function onRoutes()
    {
        $this->callFunction();
    }

    /**
     * @details Chama a função inserida na lista conforme a URL
     */
    private function callFunction()
    {
        $array = $this->rulesRoutes();
        $name_controller = self::$name_space . $array['Controller'];
        $function = $array['Function'];
        if(is_null($function)){
            switch($_SERVER['REQUEST_METHOD']){
                case 'POST': $this->functionController($name_controller, 'create');
                break;
                case 'GET': $this->functionController($name_controller, 'search');
                break;
                case 'PUT': $this->functionController($name_controller, 'update');
                break;
                case 'DELETE': $this->functionController($name_controller, 'delete');
                break;
                default: new ExceptionFramework(405);
            }
        }else{
            $this->functionController($name_controller, $function);
        }
    }

    private function functionController($name_controller, $function)
    {
        $controller = new $name_controller;

        if(!\method_exists($controller, $function))
            new ExceptionFramework(405);

        $reflection_function = new \ReflectionMethod($controller, $function);

        if(count($reflection_function->getParameters()) != 0)
        {
            echo json_encode($controller->{$function}(Utils::$request));
        }
        else
            echo json_encode($controller->{$function}());
    }

    /**
     * @details verificando se a rota deve receber parametros junto a URL
     */
    private function getParamsRoutes($paramsObj, $array = [])
    {
        $count_Request = count($array);
        $count_Params = count($paramsObj['Params']);
        if(is_null($count_Params)){
            $lista = [];
            if (!($count_Params == $count_Request))
                new ExceptionFramework(422);

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
        }
        return $paramsObj;
    }

    private function rulesRoutes()
    {
        Utils::$header = getallheaders();
        /**
         * @details Verificando se a rota permitite o metodo HTTP
         */
        if($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
            exit;

        if(!key_exists($_SERVER['REQUEST_METHOD'],Routes::$listaRoutes))
            new ExceptionFramework(405);
        $routes = Routes::$listaRoutes[$_SERVER['REQUEST_METHOD']];

        /**
         * @details Validando se a URL tem nas rotas
         */
        $restFull = new RestFull();
        $restFull->checkUrl($routes, "/".$_REQUEST["url"]);

        if(is_null($restFull->urlFinal))
            new ExceptionFramework(405);

        $this->setObjRoutes($routes[$restFull->urlFinal]);

        /**
         * @details Validando Token
         */
        if($this->objRoutes['Auth'])
            $this->validateToken();

        if($restFull->params) {
            $this->setParams($restFull->params);
            Utils::$request = (object)$restFull->params;
            unset($restFull);
        }

        return $this->getParamsRoutes($this->getObjRoutes(), $this->getParams());
    }
}