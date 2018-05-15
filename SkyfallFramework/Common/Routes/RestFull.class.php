<?php

namespace SkyfallFramework\Common\Routes;

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Session\Session;
use SkyfallFramework\Common\Utils\Utils;
use SkyfallFramework\Common\Routes\Routes;

/**
 * Class RestFullAPI
 * @package SkyfallFramework\Common\Routes
 */
class RestFull
{
    private $lastRoute = array();
    private $lastHTTP = "";

    public function __construct()
    {
    }

    private function mapthContents($type, $param)
    {
        $http = $this->lastHTTP;
        $end = end($this->lastRoute);
        Routes::$listaRoutes[$http][key($end)][$type] = $param;
        $this->validationParamsRoutes();
        $teste = Routes::$listaRoutes[$http];
        $r = Routes::$listaRoutes;
    }

    private function factoryArrayRoute($method, $url, $controller, $function = null)
    {
        $array = [
            'Controller' => $controller,
            'Function' => $function,
        ];
        Routes::$listaRoutes[$method][$url] = $array;
        $this->lastRoute[$method][$url] = $array;
        $this->lastHTTP = $method;
        return $this;
    }

    public function contents($params)
    {
        $this->mapthContents('Params', $params);
        return $this;
    }

    public function auth($auth)
    {
        $this->mapthContents('Auth', $auth);
        $this->validationParamsRoutes();
        return $this;
    }

    public function get($url, $controller, $function = null)
    {
        $this->lastRoute = [];
        $this->factoryArrayRoute('GET', $url, $controller, $function);
        $this->validationParamsRoutes();
        return $this;
    }

    public function post($url, $controller, $function = null)
    {
        $this->lastRoute = [];
        $this->factoryArrayRoute('POST', $url, $controller, $function);
        $this->validationParamsRoutes();
        return $this;
    }

    public function delete($url, $controller, $function = null)
    {
        $this->lastRoute = [];
        $this->factoryArrayRoute('DELETE', $url, $controller, $function);
        $this->validationParamsRoutes();
        return $this;
    }

    public function put($url, $controller, $function = null)
    {
        $this->lastRoute = [];
        $this->factoryArrayRoute('PUT', $url, $controller, $function);
        $this->validationParamsRoutes();
        return $this;
    }

    private function validationParamsRoutes()
    {
        $http = $this->lastHTTP;
        $end = end($this->lastRoute);
        if(!key_exists('Params',Routes::$listaRoutes[$http][key($end)])){
            Routes::$listaRoutes[$http][key($end)]['Params'] = null;
        }
    }

    /**
     * @details Validando Token
     */
    protected function validateToken()
    {
        if(isset($_COOKIE))
            Session::validationSession();

        $headers = getallheaders();

        if(!isset($headers['x-auth-token']))
            new ExceptionFramework('Token não informado', 403);

        Utils::$token = $headers['x-auth-token'];
        unset($headers);
        Auth::authentication(Utils::$token);
    }
}