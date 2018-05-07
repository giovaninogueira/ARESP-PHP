<?php

namespace SkyfallFramework\Common\Routes;

use SkyfallFramework\Common\Exception\ExceptionFramework;
use SkyfallFramework\Common\Auth\Auth;
use SkyfallFramework\Common\Session\Session;
use SkyfallFramework\Common\Utils\Utils;
use SkyfallFramework\Common\RestFull\RestFull;
use SkyfallFramework\Common\Routes\Routes;

/**
 * Class RestFullAPI
 * @package SkyfallFramework\Common\Routes
 *
 */
class RestFullAPI
{
    private $lastRoute = array();

    public function __construct()
    {
    }

    private function mapthContents($type, $param)
    {
        $http = key($this->lastRoute);
        $end = end($this->lastRoute);
        Routes::$listaRoutes[$http][key($end)][$type] = $param;
    }

    private function factoryArrayRoute($method, $url, $controller, $function = null)
    {
        $array = [
            'Controller' => $controller,
            'Function' => $function,
        ];
        Routes::$listaRoutes[$method][$url] = $array;
        $this->lastRoute = Routes::$listaRoutes;
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
        return $this;
    }

    public function get($url, $controller, $function = null)
    {
        $this->factoryArrayRoute('GET', $url, $controller, $function);
        return $this;
    }

    public function post($url, $controller, $function = null)
    {
        $this->factoryArrayRoute('POST', $url, $controller, $function);
        return $this;
    }

    public function delete($url, $controller, $function = null)
    {
        $this->factoryArrayRoute('DELETE', $url, $controller, $function);
        return $this;
    }

    public function update($url, $controller, $function = null)
    {
        $this->factoryArrayRoute('UPDATE', $url, $controller, $function);
        return $this;
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