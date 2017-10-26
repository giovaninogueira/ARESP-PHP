<?php

namespace Common\Kernel\Model;

class Routes{

    private $url;

    private $methodHttp;

    private $method;

    private $params = array();

    private $objRoutes;

    static  $listaRoutes;

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
}